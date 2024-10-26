<?php
$id_producto = $_GET['id_producto'];
include("../bd/abrir_conexion.php");

// Verificar si el producto existe
$sql_check_product = "SELECT id_producto FROM producto WHERE id_producto = ?";
$stmt = $conn->prepare($sql_check_product);

if ($stmt) {
    $stmt->bind_param('s', $id_producto);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Si el producto existe, proceder con la eliminación
        $sql_delete = "DELETE FROM producto WHERE id_producto = ?";
        $stmt_delete = $conn->prepare($sql_delete);

        if ($stmt_delete) {
            $stmt_delete->bind_param('s', $id_producto);

            if ($stmt_delete->execute()) {
                echo '<script type="text/javascript">
                        alert("Producto eliminado exitosamente.");
                        window.location.href = "../admin/admin.php";
                      </script>';
                exit();
            } else {
                echo '<script type="text/javascript">
                        alert("ERROR: No se pudo eliminar el producto.");
                        window.location.href = "../admin/admin.php";
                      </script>';
            }
        } else {
            echo '<script type="text/javascript">
                    alert("ERROR: No se pudo preparar la consulta de eliminación.");
                    window.location.href = "../admin/admin.php";
                  </script>';
        }
    } else {
        echo '<script type="text/javascript">
                alert("ERROR: Producto no encontrado.");
                window.location.href = "../admin/admin.php";
              </script>';
    }
} else {
    echo '<script type="text/javascript">
            alert("ERROR: No se pudo preparar la consulta de verificación.");
            window.location.href = "../admin/admin.php";
          </script>';
}

include("../bd/cerrar_conexion.php");