<?php
include("../bd/abrir_conexion.php");

// GUARDAR

if (isset($_POST['guardar'])) {
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$existe = "0";

	//CONSULTAR
	$resultados = mysqli_query($conexion, "INSERT INTO `$tabla_db1` (`id`, `nombre`, `cantidad`, `precio`) VALUES ($id, '$nombre', '$cantidad', '$precio');");
	while ($consulta = mysqli_fetch_array($resultados)) {
		$existe = "1";
	}

	if ($existe == "1") {
		echo '<script type="text/javascript">
			alert("ERROR: El producto ya existe");
			window.location.href="index.php";
			</script>';
	} else {
		header("refresh:0;url=index.php");
	}
}
include("../bd/cerrar_conexion.php");
