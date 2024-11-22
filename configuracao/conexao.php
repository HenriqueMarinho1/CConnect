<?php
header('Access-Control-Allow-Origin: *');

try {
	$user = "u149144215_connect";
	$pass = "02152301He.";
	$conn = new PDO('mysql:host=localhost;dbname=u149144215_connect;charset=utf8', $user, $pass);
	
}catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
}
