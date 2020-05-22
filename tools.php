<?php 


function generate_filepath($key, $netid) {
	return $_SERVER['DOCUMENT_ROOT'] . "/storage/". $key . $netid . ".dat"; 
}

function is_valid_value($value) {
	return preg_match("/^([a-f0-9]{64})$/", $hash) == 1
}

function generate_value($length) {
	$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
	$numChars = strlen($chars);
	$string = '';
	for ($i = 0; $i < $length; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	}

	return hash("sha256", $string);
}