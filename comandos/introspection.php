<?php

/*
 * comandos/introspection.php
 */

// Introspeccion: ¿Que comandos conozco?
echo "--- Introspeccion: comandos implementados  ---\n";
echo "----------------------------------------------\n";
foreach (array_keys($comandos) as $nombre_cmd)
{
        echo "[$nombre_cmd]: ". $comandos[$nombre_cmd]['descripcion']."\n";

        // Volcado completo del comando
        //foreach ($comandos[$nombre_cmd]['implementacion'] as $line)
        //      echo $line."\n";
}
echo "--- Fin introspreccion --- \n\n";

?>

