<?php
include("bd/abrir_conexion.php");

if (isset($_POST['buscar'])) {
	$id = $_POST['id'];
	$valores = array();
	$valores['existe'] = "0";

	//CONSULTAR
	$resultados = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE id = '$id'");
	while ($consulta = mysqli_fetch_array($resultados)) {
		$valores['existe'] = "1";
		$valores['nombre'] = $consulta['nombre'];
		$valores['cantidad'] = $consulta['cantidad'];
		$valores['precio'] = $consulta['precio'];
	}
	sleep(0.5);
	$valores = json_encode($valores);
	echo $valores;
}

include("bd/cerrar_conexion.php");
