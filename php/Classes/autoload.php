<?php

spl_autoload_register(function($Author) {

	$prefix = "Jmashke4\\ObjectOrientedPhase1";
	$baseDir = __DIR__;


	$len = strlen($prefix);
	if (strncmp($prefix, $Author, $len) !== 0) {
		return;
	}

	$className = substr($Author, $len);

	$file = $baseDir . str_replace("\\", "/", $Author) . ".php";

	if(file_exists($Author)) {
		require_once($Author);
	}
});