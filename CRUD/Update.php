<?php
header('Content-Type: application/json'); // Indica que la respuesta es JSON

include("../bd/abrir_conexion.php");

if (isset($_POST['actualizar'])) {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];

    // Actualizar registro en la base de datos
    $query = "UPDATE Usuario SET nombre = ?, direccion = ?, correo = ? WHERE documento = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nombre, $direccion, $correo, $documento);

    if ($stmt->execute()) {
        $response = array("status" => "success", "message" => "Actualizado exitosamente");
    } else {
        $response = array("status" => "error", "message" => "ERROR: no se pudo actualizar");
    }

    echo json_encode($response);
    $stmt->close();
}

include("../bd/cerrar_conexion.php");
