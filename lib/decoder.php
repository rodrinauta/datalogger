<?php

/*
	decoder.php: Interpret frames provided by DustMate
	
*/

/* 
$trama = ":D194210005034E02B10498000000000000000000000797033A05170000000000000000016350";
$trama = ":D19421000100000000070A0000000000000000000000000000070A00000000000000000163FB";
$trama = ":D194210005077603DC059901A8000000000000000006EC039805B401930000000000000163A8"; // Trama con lectura completa
$trama = ":D19421000100000000070A0000000000000000000000000000070A00000000000000000163FB";
$trama = ":D1942100010000000006FC000000000000000000000000000007030000000000000000016304.";
$trama = ":D1942100010000000006CE000000000000000000000000000006F6000000000000000001631B.";
*/

// hex 0x100 looks like base value.
function hex2ppm($hex, $scale)
{
        return (hexdec($hex) - 256) * $scale;
}


// Hoping the substring actually looks like an hex number
function readSubstring ($frame, $start, $length, $scale)
{
	$substr = substr($frame, $start, $length);
	if (strcmp($substr, "000") == 0)    // Are these the same?
	{
		return "";      // Skip calculation if all zeroes
	}

	return hex2ppm($substr, $scale);
}


function readFrame ($frame)
{
	// Skip everything if frame is evil (*)
	if ($frame{6} != '1') 
	{
		echo "DustMate reports invalid data (" . $frame{6} . ") \n";
		return;
	}

	echo "$frame \n";
	echo "TSP Latest     : ". readSubstring ($frame, 12, 3, 0.1) . "\n";
	echo "PM 10 Latest   : ". readSubstring ($frame, 16, 3, 0.1) . "\n";
	echo "PM 2,5 Latest  : ". readSubstring ($frame, 20, 3, 0.01) . "\n";
	echo "PM 1 Latest    : ". readSubstring ($frame, 24, 3, 0.01) . "\n";
	echo "TSP Average    : ". readSubstring ($frame, 44, 3, 0.1) . "\n";
	echo "PM 10 Average  : ". readSubstring ($frame, 48, 3, 0.1) . "\n";
	echo "PM 2,5 Average : ". readSubstring ($frame, 52, 3, 0.01) . "\n";
	echo "PM 1 Average   : ". readSubstring ($frame, 56, 3, 0.01) . "\n";
	echo "------------------------\n";
}

//readFrame($trama);

?>
