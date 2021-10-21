<?php
	/* Conexion en xampp*/
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'thecompanydream';

	try {
	  $conex= new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
	  die('La Conexión ha sido Fallida: ' . $e->getMessage());
	}
?>