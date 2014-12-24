<?php

/*
 * c3pio.php: Conversacion eye3pio <--> DustMate
 *            Los comandos de la conversacion se encuentran
 *            en un script externo. (ver include 'algo.php'
 *            aqui abajo)
 */

include 'PhpSerial.php';   // External dependency
include 'decoder.php';     // DustMate frame decoder
include 'comm.php';        // send() / recv() / poke()

require 'database.php';  // Database interface
require 'nmea.php';      // NMEA GPS data parser


include 'comandos/parametros.php';
include 'comandos/captura-en-vivo.php';
include 'comandos/obtener-datos-4.php'; // Probando
include 'comandos/obtener-datos-3.php'; // Probando
include 'comandos/fecha.php';                       // Establecer fecha del DustMate
include 'comandos/iniciar-captura.php';
include 'comandos/detener-captura.php';           // Descriptivo
include 'comandos/captura-samples-offline-2.php'; // Supuestamente ocho mediciones en DustMate
include 'comandos/captura-samples-offline.php';   // Dos mediciones en DustMate
include 'comandos/handshake-refill-on.php';       // Handshake con refill ON
include 'comandos/borrar-datos.php';


// Configuracion inicial
$comport = new PhpSerial;
$comport->deviceSet("/dev/ttyUSB0");         // Hardcodeado por ahora
$comport->confBaudRate(9600);
$comport->deviceOpen('w+');

//stream_set_timeout($comport->_dHandle, 10);   // Nada en 10 segundos? :(


// Introspeccion: ¿Que comandos conozco?
echo "--- Introspeccion: comandos implementados  ---\n";
echo "----------------------------------------------\n";
foreach (array_keys($comandos) as $nombre_cmd)
{
	echo "[$nombre_cmd]: ". $comandos[$nombre_cmd]['descripcion']."\n";

	// Volcado completo del comando
	//foreach ($comandos[$nombre_cmd]['implementacion'] as $line)
	//	echo $line."\n";
}
echo "--- Fin introspreccion --- \n\n";

// Lanzar al DustMate los comandos uno por uno.
// Pausa de 0.25 segundos a la espera de respuesta
// para cada comando.


////// GPS STUFF ///////

/*$db = new PDO('mysql:host=localhost;dbname=gpsdb;charset=utf8','root','claveEye3##');

$f = fopen( 'php://stdin', 'r' );
echo "Service listening\n";

while( $line = fgets( $f ) ) {
  $data = nmea_parse ($line);

  // GPRMC: hora,status,lat,ns,long,ew,speed,fecha
  if ($data['type'] == 'GPRMC')   {
        $query = 'INSERT INTO gpsdata '.
                 '(type,utctime,status,latitude,ns,'.
                 'longitude,ew,speed,date) VALUES ("GPRMC","'.
                 $data['utc_time'] . '","' .
                 $data['status'] . '","' .
                 $data['latitude'] . '","' .
                 $data['ns'] . '","' .
                 $data['longitude'] . '","' .
                 $data['ew'] . '","' .
                 $data['speed'] . '","' .
                 $data['date'] . '")';
        echo $query."\n\n";
        try {
		//// DUSTMATE STUFF
		foreach ($comandos['captura-en-vivo']['implementacion'] as $cmd) 
		{
			poke($comport, $cmd, 0.25);
//                $db->query($query);
		}
		
        }


        catch (PDOException $ex) {
                echo "Oh NOES! " . $ex->getMessage();
        }
  }

  // GPGGA: quality,satelites,altitud
  if ($data['type'] == 'GPGGA') {
        $query = 'INSERT into gpsdata '.
                 '(type,utctime,fix,satellites,altitude) VALUES ("GPGGA","'.
                 $data['utc_time'] . '","' .
                 $data['fix'] . '","' .
                 $data['satellites'] . '","' .
                 $data['altitude'] . '")';
        echo $query."\n\n";
        try {
//                $db->query($query);
        } 
        catch (PDOExceptien $ex) {
                echo "Oh NOES! " . $ex->getMessage();
        }
  }
}

fclose( $f );

*/
?>
