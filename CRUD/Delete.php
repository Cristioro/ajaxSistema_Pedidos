<?php
$documento = $_GET['documento'];
include("../bd/abrir_conexion.php");

// Verificar si el usuario es un administrador
$sql_check_admin = "SELECT admin FROM Usuario WHERE documento = ?";
$stmt = $conn->prepare($sql_check_admin);
$stmt->bind_param('s', $documento);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['admin'] == 1) {
        // No se puede eliminar a un administrador
        echo '<script type="text/javascript">
                alert("ERROR: No se puede eliminar a un administrador.");
            </script>';
        header("refresh:0;url=../admin/admin.php");
    } else {
        // Ejecutar la eliminación si no es administrador
        $sql_delete = "DELETE FROM Usuario WHERE documento = ?";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->bind_param('s', $documento);

        if ($stmt_delete->execute()) {
            header("refresh:0;url=../admin/admin.php");
            exit();
        } else {
            echo '<script type="text/javascript">
                    alert("ERROR: No se pudo eliminar el usuario.");
                </script>';
            header("refresh:0;url=../admin/admin.php");
        }
    }
} else {
    echo '<script type="text/javascript">
            alert("ERROR: Usuario no encontrado.");
          </script>';
    header("refresh:0;url=../admin/admin.php");
}

include("../bd/cerrar_conexion.php");
