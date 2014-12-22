<?php

/*
 * c3pio.php: Conversacion c3pio <--> DustMate
 *            Los comandos de la conversacion se encuentran
 *            en un script externo. (ver include 'algo.php'
 *            aqui abajo)
 */

include 'PhpSerial.php';
include 'decoder.php'; // DustMate frame decoder

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

// Wrappers para visualizar conversacion en consola
function send($comport, $str, $waitForReply = 0.1)
{
        echo "--> $str";
        $comport->sendMessage($str, $waitForReply);
}


function recv($comport, $count = 0)
{
        $result = $comport->readPort($count);
        //echo "<-- $result \n";
	readFrame($result);
}


// Muestra y envia mensaje, captura y muestra respuesta
function poke($comport, $msg, $waitForReply = 0.1) 
{
	send($comport, "$msg\n", $waitForReply);
	$comport->serialFlush();
	recv($comport);
}


// Configuracion inicial
$comport = new PhpSerial;
$comport->deviceSet("/dev/ttyUSB0");         // Hardcodeado por ahora
$comport->confBaudRate(9600);
$comport->deviceOpen('w+');
stream_set_timeout($comport->_dHandle, 10);   // Nada en 10 segundos? :(


// Introspeccion: ¿Que comandos conozco?
echo "Introspeccion: comandos implementados  \n";
echo "----------------------------------------\n";
foreach (array_keys($comandos) as $nombre_cmd)
{
	echo "[$nombre_cmd]: ". $comandos[$nombre_cmd]['descripcion']."\n";

	// Volcado completo del comando
	//foreach ($comandos[$nombre_cmd]['implementacion'] as $line)
	//	echo $line."\n";
}

// Lanzar al DustMate los comandos uno por uno.
// Pausa de 0.25 segundos a la espera de respuesta
// para cada comando.
//while (1) {
//foreach ($comandos as $cmd)
//{
//	poke($comport, $cmd, 0.25);
//}
//}
?>

