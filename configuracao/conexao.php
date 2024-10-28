<?php
header('Access-Control-Allow-Origin: *');

try {
	$user = "root";
	$pass = "";
	$conn = new PDO('mysql:host=localhost:3308;dbname=cconnect;charset=utf8', $user, $pass);
	
}catch (PDOException $e) {
	    print "Error!: " . $e->getMessage() . "<br/>";
	    die();
}
