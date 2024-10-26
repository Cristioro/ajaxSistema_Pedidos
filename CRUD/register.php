<?php
include '../bd/abrir_conexion.php';

$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hashear la contraseña

// Verificar si el correo ya existe
$query_verificar = "SELECT * FROM Usuario WHERE correo = ?";
$stmt_verificar = $conn->prepare($query_verificar);
$stmt_verificar->bind_param('s', $correo);
$stmt_verificar->execute();
$result_verificar = $stmt_verificar->get_result();

if ($result_verificar->num_rows > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Este correo ya está registrado.'
    ]);
    exit();
}

// Insertar datos en la tabla Usuario
$query = "INSERT INTO Usuario (documento, nombre, direccion, correo, contrasena) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param('sssss', $documento, $nombre, $direccion, $correo, $contrasena);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Registro exitoso.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Error al registrar el usuario: ' . $stmt->error
    ]);
}

include '../bd/cerrar_conexion.php';