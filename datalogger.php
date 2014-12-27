<?php

/*
 * datalogger.php: Conversacion eye3pio <--> DustMate
 *                 Los comandos conocidos se encuentran en ./comandos
 */

// Relevant parameters
$listenAddress = "192.168.0.35";     // eye3pio.eye3.cl: 192.168.1.124
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


function buildNmeaQuery ($nmea , $gps_id = "" )
{
	// GPRMC: hora,status,lat,ns,long,ew,speed,fecha
	if ($nmea['type'] == 'GPRMC')
	{
		$query = 'INSERT INTO gpsdata '.
                	'(utctime,status,latitude,'.
		 	'longitude,speed,date) VALUES ("'.
			$nmea['utc_time'] . '","' .
			$nmea['status'] . '",' .
			$nmea['latitude'] . ',' .
			$nmea['longitude'] . ',"' .
			$nmea['speed'] . '","' .
			$nmea['date'] . '")
			';
	}
	// GPGGA: quality,satelites,altitud
	if ($nmea['type'] == 'GPGGA') {
		$query = 'UPDATE gpsdata  SET '.
			'fix =  '.
			$nmea['fix'] . ',' .
			'satellites= '.
			$nmea['satellites'] . ',' .
			'altitude= '.
			$nmea['altitude'] . 
			' where id='. 
			$gps_id	;
	}
	return $query;
}



// Using a race-condition safe method for SQL INSERT ID retrieval
// http://stackoverflow.com/questions/897356/php-mysql-insert-row-then-get-id
function buildMeasureQuery ($db, $gps_id, $tramo_id, $dustMateInfo)
{

	
	// GPGGA data in $nmea
	$pmdata_query = "INSERT INTO pmdata ".
		 "(id_gps,tsplat,pm10lat,pm25lat,pm1lat,".
		 "tspavg,pm10avg,pm25avg,pm1avg,id_tramo) VALUES (" .
		$gps_id . ",'" .
		$dustMateInfo['tsp_lat']  . "','" .
		$dustMateInfo['pm10_lat'] . "','" .
		$dustMateInfo['pm25_lat'] . "','" .
		$dustMateInfo['pm1_lat']  . "','" .
		$dustMateInfo['tsp_avg']  . "','" .
		$dustMateInfo['pm10_avg'] . "','" .
		$dustMateInfo['pm25_avg'] . "','" .
		$dustMateInfo['pm1_avg']  . "'," .
		$tramo_id  . ");";

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
		if($nmea != 'FAIL')
		{
			// Need to gather both GPRMC and GPGGA before
			// asking DustMate.
			if ($nmea['type'] == 'GPRMC') 
			{
				
					// Insert GPRMC info, then collect ID
					$gprmc_query = buildNmeaQuery ($nmea);
					$db->query ($gprmc_query);
					$gps_id = $db->lastInsertId();

		
			}
			// Expecting GPGGA *after* GPRMC.
			// Now it's time to ask DustMate 
					// and try building a full measure query.
			if ($nmea['type'] == 'GPGGA')
			{
						// Insert GPGGA info, then collect ID
						$gpgga_query = buildNmeaQuery ($nmea,$gps_id);
						$db->query ($gpgga_query);
						
						$busca_tramo = $db->query ("SELECT tramoid from graficarMapa 
							WHERE  CONTAINS(zona,
							GeomFromText('POINT(".$nmea['longitude']." ".$nmea['latitude'].")'))
							"); 
								
							$tramo_id = $busca_tramo->fetch(PDO::FETCH_COLUMN, 0);
					
					$dustMateInfo = askDustMate($comport);

					$query = buildMeasureQuery (
							$db,
							$gps_id,
							($tramo_id==''?'NULL':$tramo_id),
							$dustMateInfo);
							
					echo 'Medición en tramo '.($tramo_id==''?'No válido':$tramo_id).' con valores PMTotal=' .$dustMateInfo['tsp_lat']  . ' PM10=' .
						$dustMateInfo['pm10_lat'] . ' PM2.5=' .
						$dustMateInfo['pm25_lat'] . ' PM1=' .
						$dustMateInfo['pm1_lat'].PHP_EOL;
			}
		}
	}
}

?>
