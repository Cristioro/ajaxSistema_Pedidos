<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "sistema_pedidos";

	$tabla_db1 = "pedido";
	$tabla_db2 = "usuario";


	$conn = new mysqli($host, $user, $pass, $dbname);
	

	if ($conn->connect_error) {
		die("Conexión fallida: " . $conn->connect_error);
	}
