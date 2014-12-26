<?php

/*
 * datalogger.php: Conversacion eye3pio <--> DustMate
 *                 Los comandos conocidos se encuentran en ./comandos
 */

// Relevant parameters
$listenAddress = "127.0.0.1";     // eye3pio.eye3.cl: 192.168.1.124
$listenPort    = "5001";
$serialDevice  = "/dev/ttyUSB0";


include 'lib/PhpSerial.php';      // External dependency
include 'lib/decoder.php';        // DustMate frame decoder
include 'lib/comm.php';           // send() / recv() / poke()
include 'lib/socket.php';         // Goodbye Netcat
require 'lib/database.php';       // Database interface
require 'lib/nmea.php';           // NMEA GPS data parser
include 'comandos/comandos.php';  // DustMate command knowledge loader


// Serial port init
$comport = new PhpSerial;
$comport->deviceSet($serialDevice);
$comport->confBaudRate(9600);
$comport->deviceOpen('w+');
// Note: Pi rejects this one.
//stream_set_timeout($comport->_dHandle, 10);   // 10-sec timeout


function buildNmeaQuery ($nmea)
{
	// GPRMC: hora,status,lat,ns,long,ew,speed,fecha
	if ($nmea['type'] == 'GPRMC')
	{
		$query = 'INSERT INTO gpsdata '.
                	'(type,utctime,status,latitude,ns,'.
		 	'longitude,ew,speed,date) VALUES ("GPRMC","'.
			$nmea['utc_time'] . '","' .
			$nmea['status'] . '","' .
			$nmea['latitude'] . '","' .
			$nmea['ns'] . '","' .
			$nmea['longitude'] . '","' .
			$nmea['ew'] . '","' .
			$nmea['speed'] . '","' .
			$nmea['date'] . '")';
	}
	// GPGGA: quality,satelites,altitud
	if ($nmea['type'] == 'GPGGA') {
		$query = 'INSERT into gpsdata '.
			'(type,utctime,fix,satellites,altitude) '.
			'VALUES ("GPGGA","'.
			$nmea['utc_time'] . '","' .
			$nmea['fix'] . '","' .
			$nmea['satellites'] . '","' .
			$nmea['altitude'] . '")';
	}
	return $query;
}



// Using a race-condition safe method for SQL INSERT ID retrieval
// http://stackoverflow.com/questions/897356/php-mysql-insert-row-then-get-id
function buildMeasureQuery ($db, $gprmc, $gpgga, $dustMateInfo)
{
	// Insert GPRMC info, then collect ID
	$gprmc_query = buildNmeaQuery ($gprmc);
	$db->query ($gprmc_query);
	$gprmc_id = $db->lastInsertId();

	// Insert GPGGA info, then collect ID
	$gpgga_query = buildNmeaQuery ($gpgga);
	$db->query ($gpgga_query);
	$gpgga_id = $db->lastInsertId();
	
	// GPGGA data in $nmea
	$pmdata_query = "INSERT INTO pmdata ".
		 "(gprmc,gpgga,tsplat,pm10lat,pm25lat,pm1lat,".
		 "tspavg,pm10avg,pm25avg,pm1avg) VALUES ('" .
		$gprmc_id . "','" .
		$gpgga_id . "','" .
		$dustMateInfo['tsp_lat']  . "','" .
		$dustMateInfo['pm10_lat'] . "','" .
		$dustMateInfo['pm25_lat'] . "','" .
		$dustMateInfo['pm1_lat']  . "','" .
		$dustMateInfo['tsp_avg']  . "','" .
		$dustMateInfo['pm10_avg'] . "','" .
		$dustMateInfo['pm25_avg'] . "','" .
		$dustMateInfo['pm1_avg']  . "');";

	$db->query ($pmdata_query);
	return $pmdata_query;
}


// Main: TCP listen loop
while ($client = socket_accept ($sock))
{
	// Max 256 chars/read, stop at '\r' or '\n'
	while ($gpsdata = socket_read ($client, 256, PHP_NORMAL_READ))
	{
		$nmea = nmea_parse ($gpsdata);
		if (!isValidNmea($nmea))
		{
			echo "Invalid " . $nmea['type'] . " data\n";
		}
		// Nmea packet is valid at this point. 
		// Need to gather both GPRMC and GPGGA before
		// asking DustMate.
		if ($nmea['type'] == 'GPRMC') 
		{
			$gprmc = $nmea;
		}
		// Expecting GPGGA *after* GPRMC.
		// Now it's time to ask DustMate 
                // and try building a full measure query.
		if ($nmea['type'] == 'GPGGA')
		{
			$gpgga = $nmea;
			if (isValidNmea($gprmc) && isValidNmea($gpgga))
			{
				$dustMateInfo = askDustMate($comport);
				if ($dustMateInfo != 'INVALID') 
				{
					$query = buildMeasureQuery (
						$db,
						$gprmc,
						$gpgga,
						$dustMateInfo);
				}
			}
		}
	}
}

?>
