<?php

// Relevant parameters
$androidAddress = "192.168.43.254"; // Acer iconia tab
$androidPort   = "9999";


// Sample data
$nmea['utc_time']  = "144000";
$nmea['date']      = "010415";
$nmea['latitude']  = "-20.999999";
$nmea['longitude'] = "-68.788888";
$nmea['speed']     = "25.5";

$dustMateInfo['tsp_lat']  = "";
$dustMateInfo['pm10_lat'] = "";
$dustMateInfo['pm25_lat'] = "";
$dustMateInfo['pm1_lat']  = "";
$dustMateInfo['tsp_avg']  = "165.5";
$dustMateInfo['pm10_avg'] = "73.3";
$dustMateInfo['pm25_avg'] = "11.1";
$dustMateInfo['pm1_avg']  = "1.1";


function reportToAndroid ($androidSocket, $nmea, $dustMateInfo) 
{
	$dataString = 	$nmea['date'] . "|" .
					$nmea['utc_time'] . "|" .
					round($nmea['latitude'], 6) . "|" .
					round($nmea['longitude'], 6) . "|" .
					round($dustMateInfo['tsp_avg'], 1) . "|" .
					round($dustMateInfo['pm10_avg'], 1) . "|" .
					round($dustMateInfo['pm25_avg'], 1) . "|" .
					round($dustMateInfo['pm1_avg'], 1) . "|" .
					round($nmea['speed'], 1) . "\n";	
	socket_send($androidSocket, $dataString, strlen($dataString), 0);				
	echo "--> ". $dataString;
}


if (($androidSocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) and
	(socket_connect($androidSocket, $androidAddress, $androidPort)))
{
	echo "Connected to ". $androidAddress .":". $androidPort ."\n";
	var_dump($androidSocket);
} 
else 
{
	echo "Unable to connect to ". $androidAddress .":". $androidPort ."\n";
}


while (1)
{
	reportToAndroid ($androidSocket, $nmea, $dustMateInfo);
	
	// Modificar datos de maqueta
	$nmea['latitude']  -= 0.00001;
	$nmea['longitude'] -= 0.00002;
	$nmea['speed']     += 0.1;
	$dustMateInfo['tsp_avg']  += 0.1;
	$dustMateInfo['pm10_avg'] += 0.1;
	$dustMateInfo['pm25_avg'] += 0.1;
	$dustMateInfo['pm1_avg']  += 0.1;
	sleep(1);
}

?>
