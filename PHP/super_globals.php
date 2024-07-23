<?php

#
# Super globals
#
# https://www.php.net/manual/en/language.variables.superglobals.php
#

# $_SERVER
# Infos about the server and the script

print_r($_SERVER);

echo PHP_EOL;

printf("%-16s => %s" . PHP_EOL, "argc", $_SERVER['argc']); # Also $argc
printf("%-16s => %s" . PHP_EOL, "argv", implode(', ', $_SERVER['argv'])); # Also argv
printf("%-16s => %s" . PHP_EOL, "REQUEST_TIME", $_SERVER['REQUEST_TIME_FLOAT']);
printf("%-16s => %s" . PHP_EOL, "REQUEST_TIME_FLOAT", $_SERVER['REQUEST_TIME']);

# $_GET, $_POST and $_FILES
# GET and POST request variables, uploaded FILES

print_r($_GET);
print_r($_POST);
print_r($_FILES);

# $_COOKIE and $_SESSION
# Get variables in user's cookies and session

print_r($_COOKIE);
# print_r($_SESSION);

# $_REQUEST
# By default, contains content of $_GET, $_POST and $_COOKIE
print_r($_REQUEST);

# $_ENV
# Variables mainly provided by the environment PHP is running in

print_r($_ENV);

# $GLOBALS
# Variables accessible from the global scope

$globalVariable = ":)";
print_r($GLOBALS);
