#!/usr/bin/php
<?php

$input = "";
$fp = fopen("php://stdin", "r");
while ( $line = fgets($fp, 1024) )
	$input .= $line;
	
fclose($fp);

$input =  doThings($input);
echo $input;

// doing things
function doThings($input){
	$input = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $input);
	return $input;
}
?>