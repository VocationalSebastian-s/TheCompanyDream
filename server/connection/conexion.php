<?php
	/* Conexion en xampp
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'thecompanydream';*/

	/* Conexion en remotemysql.com*/
	$server = 'remotemysql.com';
	$username = 'W80NGrZVyT';
	$password = 'VU7ZJIPVe8';
	$database = 'W80NGrZVyT';
	

	try {
	  $conex= new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
	  die('La Conexión ha sido Fallida: ' . $e->getMessage());
	}
?>
