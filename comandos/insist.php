<?php

/*
 *  c3pio.php: Conversacion c3pio <--> DustMate
 *           Los comandos de la conversacion se encuentran
 *           en un script externo. (ver include 'algo.php'
 *           aqui abajo)
 */

include 'PhpSerial.php';
include 'handshake-refill-on.php'; // Handshake con refill ON


// Wrappers para visualizar conversacion en consola
function send($comport, $str, $waitForReply = 0.1)
{
        echo "--> $str";
        $comport->sendMessage($str, $waitForReply);
}


function recv($comport, $count = 0)
{
        $result = $comport->readPort($count);
        echo "<-- $result \n";
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


// Lanzar al DustMate los comandos uno por uno.
// Pausa de 0.25 segundos a la espera de respuesta
// para cada comando.
foreach ($comandos as $cmd)
{
	poke($comport, $cmd, 0.25);
}

?>

