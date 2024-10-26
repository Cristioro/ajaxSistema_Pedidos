<?php
include("bd/abrir_conexion.php");

if (isset($_POST['buscar'])) {
    $id_producto = $_POST['id_producto'];
    $valores = array();
    $valores['existe'] = "0";

    // Consultar
    $resultados = mysqli_query($conn, "SELECT * FROM producto WHERE id_producto = '$id_producto'");
    if ($resultados && mysqli_num_rows($resultados) > 0) { // Verifica si hay resultados
        $consulta = mysqli_fetch_array($resultados);
        $valores['existe'] = "1";
        $valores['precio'] = $consulta['precio'];
        $valores['cantidad'] = $consulta['cantidad']; // Cambié a cantidad
    }
    
    echo json_encode($valores); // Envía el array como JSON
}

include("bd/cerrar_conexion.php");