<?php

$comandos['iniciar-captura'] = [
	'descripcion'    => 'Ordenar inicio de captura a DustMate',
	'implementacion' => array(
	
	"!D1942448.",
)];

$comandos['captura-en-vivo'] = [
	'descripcion'    => 'Toma una muestra durante una captura en curso',
	'implementacion' => array(
	
	"!D19420017814.", // Gimmeh teh day-tah plz
)];

$comandos['detener-captura'] = [
	'descripcion'    => 'Detener captura en curso',
	'implementacion' => array(

	"!D194264A.",
)];

$comandos['borrar-datos'] = [
	'descripcion'    => 'Eliminacion de muestras almacenadas en DustMate',
	'implementacion' => array(

	"!D1942549.",
)];

$comandos['parametros'] = [
	'descripcion' => "Establece valores para captura en DustMate",
	'implementacion' => array(
	
	"!D1942201B0Eye3Online Remote Control 41.", // Nombre trama
	"!D1942201C00100010001000100010001000100010022.", // Establecer unidades de medicion
	"!D1942801A0CF070E.",                             // Parametros a capturar (PMTotal/PM2.5/PM10/PM1)
	"!D1942801A50101E5.",                             // ?????
	"!D1942B56.",                                     // Commit (profit!)
	)
];

$comandos['fecha'] = [
	'descripcion'    => 'Establecer fecha y hora de dispositivo (13:37, 20-DEC-2014)',
	'implementacion' => array(
	
	"!D1942D00141220001337567B.", // 13:37 20-DEC-2014
	//  "!D1942D00141220001337567B.", // ?
	//"!D1942D001412200015160574.", // Captura de Lex 15:16
)];

$comandos['handshake-refill-on'] = [
	'descripcion'    => 'Comandos de handshake (con refill ON)',
	'implementacion' => array(
	
	"!D1942F5A.",     /* Log 3151 */
	"!D1942a000035.", /* Log 3176 */
	"!D1942a004039.", /* Log 3207 */
	"!D1942a00803D.", /* Log 3236 */
	"!D1942a00C048.", /* Log 3267 */
	"!D1942a010036.", /* Log 3299 */
	"!D1942a01403A.", /* Log 3331 */
	"!D1942a01803E.", /* Log 3361 */
	"!D1942a01C049.", /* Log 3391 */
	"!D1942a020037.", /* Log 3424 */
	"!D1942a02403B.", /* Log 3454 */
	"!D1942a02803F.", /* Log 3485 */
	"!D1942a02C04A.", /* Log 3517 */
	"!D1942a030038.", /* Log 3548 */
	"!D1942a03403C.", /* Log 3579 */
	"!D1942a038040.", /* Log 3610 */
	"!D1942a03C04B.", /* Log 3641 */
	"!D1942a040039.", /* Log 3674 */
	"!D1942a04403D.", /* Log 3705 */
	"!D1942a048041.", /* Log 3734 */
	"!D1942a04C04C.", /* Log 3765 */
	"!D1942a05003A.", /* Log 3800 */
	"!D1942F5A.", 	  /* Log 3833 */
	"!D1942301B01A.", /* Log 3856 */
	"!D1942301C01B.", /* Log 3881 */
	"!D1942101A017.", /* Log 3904 */
	"!D19421018816.", /* Log 3937 */
	"!D1942F5A.", 	  /* Log 3965 */
	)];

$comandos['captura-samples-offline'] = [
	'descripcion'    => 'Recuperacion de muestras almacenadas en DustMate',
	'implementacion' => array(
	
	"!D19427010814.",
	"!D19427010814.",
	"!D1942303300D.",
	"!D1942303300D.",
	"!D1942103200A.",
	"!D1942103200A.",
	"!D19421030008.",
	"!D19421030008.",
	"!D19421031009.",
	"!D19421031009.",
	"!D1942103400C."
)];

$comandos['obtener-datos-3'] = [
	'descripcion'    => 'Extraccion de una medicion desde la memoria del DustMate',
	'implementacion' => array(
	
	"!D19427010814.",
	"!D19427010814.",
	"!D1942303300D.",
	"!D1942303300D.",
	"!D1942103200A.",
	"!D1942103200A.",
	"!D19421030008.",
	"!D19421030008.",
	"!D19421031009.",
	"!D19421031009.",
	"!D1942103400C.",
)];

$comandos['obtener-datos-4'] = [
	'descripcion'    => '[test] Extraccion de primera y segunda mediciones desde la memoria del DustMate',
	'implementacion' => array(
/* Recolectar primera medicion

	"!D19427010814.",
	"!D19427010814.",
	"!D1942303300D.",
	"!D1942303300D.",
	"!D1942103200A.",
	"!D1942103200A.",
	"!D19421030008.",
	"!D19421030008.",
	"!D19421031009.",
	"!D19421031009.",
	"!D1942103400C.",
*/

/* Captura de segunda y primera medicion 
 * (exactamente en ese orden!)
 */
	"!D19427010915.",
	"!D19427010915.",
	"!D19423037A22.",
	"!D19423037A22.",
	"!D19421036A1F.",
	"!D19421036A1F.",
	"!D19421034A1D.",
	"!D19421034A1D.",
	"!D19421035A1E.",
	"!D19421035A1E.",
	"!D19421038A21.",
	"!D19427010814.",
	"!D19427010814.",
	"!D1942303300D.",
	"!D1942303300D.",
	"!D1942103200A.",
	"!D1942103200A.",
	"!D19421030008.",
	"!D19421030008.",
	"!D19421031009.",
	"!D19421031009.",
	"!D1942103400C.",
)];

$comandos['captura-samples-offline-2'] = [
	'descripcion'    => '[test] Recuperacion de una muestra larga almacenada en DustMate',
	'implementacion' => array(
	
"!D19427010915.",
"!D19427010915.",
"!D19423076418.",
"!D19423076418.",
"!D19421075415.",
"!D19421075415.",
"!D19421073413.",
"!D19421073413.",
"!D19421074414.",
"!D19421074414.",
"!D19421077417.",
"!D19421078418.",
"!D19421079419.",
"!D1942107A421.",
"!D1942107B422.",
"!D1942107C423.",
"!D1942107D424.",
"!D1942107E425.",
"!D1942107F426.",
"!D19421080411.",
"!D19421081412.",
"!D19421082413.",
"!D19421083414.",
"!D19421084415.",
"!D19421085416.",
"!D19421086417.",
"!D19421087418.",
"!D19421088419.",
"!D1942108941A.",
"!D1942108A422.",
"!D1942108B423.",
"!D1942108C424.",
"!D1942108D425.",
"!D1942108E426.",
"!D1942108F427.",
"!D19421090412.",
"!D19421091413.",
"!D19421092414.",
"!D19421093415.",
"!D19421094416.",
"!D19421095417.",
"!D19421096418.",
"!D19421097419.",
"!D1942109841A.",
"!D1942109941B.",
"!D1942109A423.",
"!D1942109B424.",
"!D1942109C425.",
"!D1942109D426.",
"!D1942109E427.",
"!D1942109F428.",
"!D194210A041A.",
"!D194210A141B.",
"!D194210A241C.",
"!D194210A341D.",
"!D194210A441E.",
"!D194210A541F.",
"!D194210A6420.",
"!D194210A7421.",
"!D194210A8422.",
"!D194210A9423.",
"!D194210AA42B.",
"!D194210AB42C.",
"!D194210AC42D.",
"!D194210AD42E.",
"!D194210AE42F.",
"!D194210AF430.",
"!D194210B041B.",
"!D194210B141C.",
"!D194210B241D.",
"!D194210B341E.",
"!D194210B441F.",
"!D194210B5420.",
"!D194210B6421.",
"!D194210B7422.",
"!D194210B8423.",
"!D194210B9424.",
"!D194210BA42C.",
"!D194210BB42D.",
"!D194210BC42E.",
"!D19427010814.",
"!D19427010814.",
"!D1942303300D.",
"!D1942303300D.",
"!D1942103200A.",
"!D1942103200A.",
"!D19421030008.",
"!D19421030008.",
"!D19421031009.",
"!D19421031009.",
"!D1942103400C.",
"!D1942103500D.",
"!D1942103600E.",
"!D1942103700F.",
"!D19421038010.",
"!D19421039011.",
"!D1942103A019.",
"!D1942103B01A.",
"!D1942103C01B.",
"!D1942103D01C.",
"!D1942103E01D.",
"!D1942103F01E.",
"!D19421040009.",
"!D1942104100A.",
"!D1942104200B.",
"!D1942104300C.",
"!D1942104400D.",
"!D1942104500E.",
"!D1942104600F.",
"!D19421047010.",
"!D19421048011.",
"!D19421049012.",
"!D1942104A01A.",
"!D1942104B01B.",
"!D1942104C01C.",
"!D1942104D01D.",
"!D1942104E01E.",
)];


?>
