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

?>
