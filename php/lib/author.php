<?php

require_once (dirname(__DIR__). "/Classes/autoload.php");
require_once (dirname(__DIR__). "/vendor/autoload.php");
use Jmashke4\ObjectOrientPhase1\Author;
$hash = password_hash("password", PASSWORD_ARGON2I, ["time_cost" => 7]);
$author = new Author("c74b460d-3698-4b4f-acdb-05177ab4b4b4", "12345678901234567890123456789012","https://bidfuvbdvd.com", "iybuvyarb@gmail.com", $hash,
"jmashke");



var_dump($author);
