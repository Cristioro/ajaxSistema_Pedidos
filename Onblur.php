<?php
include("bd/abrir_conexion.php");

if (isset($_POST['buscar'])) {
	$id_producto = $_POST['id_producto'];
	$valores = array();
	$valores['existe'] = "0";

	//CONSULTAR
	$resultados = mysqli_query($conn, "SELECT * FROM producto WHERE id_producto = '$id_producto'");
	while ($consulta = mysqli_fetch_array($resultados)) {
		$valores['existe'] = "1";
		$valores['precio'] = $consulta['precio'];
		$valores['cantidad'] = $consulta['cantidad'];
	}
	sleep(0.5);
	$valores = json_encode($valores);
	echo $valores;
}

include("bd/cerrar_conexion.php");
