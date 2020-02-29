<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/*
-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-**-*-*-*
	CloudNet Webinterface by Niekold (Niekold#9410)

	- You are not allowed to resell the plugin/website
	- You are not allowed to reupload the plugin/website anywhere else
    - Refunds are not accepted
    - any error/bug should be posted in the resource's thread, not in the review section otherwise I will not give a support for reported bugs in     review section
	- You are not allowed to share this resource with others
    - You are not allowed to claim ownership of this resource

	Copyrighted by Niekold © 2018
	

	|-----------|
	|0 = false	|
	|1 = true	|
	|-----------|
	
	
-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-**-*-*-**-*-*-*
*/


/* Configurations */

$domain = "https://domain.de/stats";
$maindomain = "https://domain.de";


$ip = "localhost";
$user = "user";
$password = "pw?H78t";
$database = "db";

try {
    $pdo = new PDO('mysql:host=' . $ip . ';charset=utf8;dbname=' . $database, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die('Mysql verbindung fehlgeschlagen.');
}

$topplayeramount = "10";

$servername = "Nevercold.eu";
$richname = "Nevercold.eu - Stats";
$richtext = "Seh dir deine Stats an!";



$debug = "false";
/* Dont Change! */
$version = "1.3";
/* Dont Change! */