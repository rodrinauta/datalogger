<?php

/*
 * comm.php: Enviar y recibir mensajes desde puerto serial
 */

// Wrappers para visualizar conversacion en consola
function send($comport, $str, $waitForReply = 0.1)
{
        echo "--> $str";
        $comport->sendMessage($str, $waitForReply);
}


// Recibe datos y ordena a readFrame (decoder.php)
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


function askDustMate($comport, $command = 'captura-en-vivo', $waitForReply = 0.25)
{
/*
	// Raspberry Pi
	foreach ( $comandos[$command]['implementacion'] as $instruccion )
	{
		send($comport, $instruccion , $waitForReply);
		$comport->serialFlush();
		$dustInfo[] = $comport->readPort(0);
	}
*/

	// Simulator
	$dustInfo = ":D194210005077603DC059901A8000000000000000006EC039805B401930000000000000163A8";

	// Got frame now. Is it evil?
	if ($dustInfo{6} != '1') 
	{
		return "INVALID";
	}
	$dustMate['tsp_lat']  = readSubString ($dustInfo, 12, 3, 0.1);
	$dustMate['pm10_lat'] = readSubString ($dustInfo, 16, 3, 0.1);
	$dustMate['pm25_lat'] = readSubString ($dustInfo, 20, 3, 0.01);
	$dustMate['pm1_lat']  = readSubString ($dustInfo, 24, 3, 0.01);
	$dustMate['tsp_avg']  = readSubString ($dustInfo, 44, 3, 0.1);
	$dustMate['pm10_avg'] = readSubString ($dustInfo, 48, 3, 0.1);
	$dustMate['pm25_avg'] = readSubString ($dustInfo, 52, 3, 0.01);
	$dustMate['pm1_avg']  = readSubString ($dustInfo, 56, 3, 0.01);
	return $dustMate;
}

?>
