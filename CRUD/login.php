<?php
session_start();
include '../bd/abrir_conexion.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Buscar el usuario por correo
$query = "SELECT * FROM Usuario WHERE correo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verificar contraseña
    if (password_verify($contrasena, $user['contrasena'])) {
        // Iniciar sesión y guardar datos del usuario en la sesión
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['correo'] = $user['correo'];
        $_SESSION['documento'] = $user['documento'];
        $_SESSION['admin'] = $user['admin']; // Verificar si es admin

        if ($_SESSION['admin'] == 1) {
            echo json_encode([
                'success' => true,
                'redirect' => 'admin/admin.php' // Redirigir a la página de admin
            ]);
        } else {
            echo json_encode([
                'success' => true,
                'redirect' => 'vista.php' // Redirigir a la página de usuario normal
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Contraseña incorrecta.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Correo no registrado.'
    ]);
}

include '../bd/cerrar_conexion.php';