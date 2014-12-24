<?php

/*
 * lib/socket.php: TCP socket listening services
 */

$sock = socket_create (AF_INET, SOCK_STREAM, SOL_TCP);
socket_bind ($sock, $listenAddress, $listenPort);
socket_listen ($sock);

echo "Attempting to listen on $listenAddress:$listenPort";

?>
