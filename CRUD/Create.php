<?php
include("../bd/abrir_conexion.php");

// GUARDAR
if (isset($_POST['guardar'])) {
    $id_producto = $_POST['id_producto'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $documento = $_POST['documento']; // Asumiendo que estás enviando el documento del usuario

    // CONSULTAR
    $select = mysqli_query($conn, "SELECT nombre, cantidad FROM producto WHERE id_producto = '$id_producto'");

    if ($select) {
        $consulta0 = mysqli_fetch_array($select);
        
        // Verifica si se obtuvo un producto
        if ($consulta0) {
            $producto = $consulta0['nombre'];
            $cantidadTotal = $consulta0['cantidad'];

            // Verifica si hay suficiente cantidad
            if ($cantidad > $cantidadTotal) {
                echo '<script type="text/javascript">
                    alert("ERROR: No hay suficiente cantidad disponible.");
                    window.location.href="index.php";
                </script>';
                exit();
            }

            // Calcular el valor total
            $valor_total = $precio * $cantidad;

            // INSERTAR PEDIDO
            $resultados = mysqli_query($conn, "INSERT INTO `Pedido` (`producto`, `valor_total`, `cantidad`, `id_producto`) VALUES ('$producto', '$valor_total', '$cantidad', '$id_producto')");
            
            if ($resultados) {
                // Obtener el id_pedido del pedido insertado
                $id_pedido = mysqli_insert_id($conn);

                // Actualizar cantidad restante
                $cantidadRestante = $cantidadTotal - $cantidad;
                $updateProducto = mysqli_query($conn, "UPDATE producto SET cantidad = $cantidadRestante WHERE id_producto = $id_producto");

                // Actualizar la tabla usuario usando documento
                $updateUsuario = mysqli_query($conn, "UPDATE Usuario SET id_pedido = '$id_pedido' WHERE documento = '$documento'");

                if ($updateProducto && $updateUsuario) {
                    header("refresh:0;url=vista.php");
                } else {
                    echo "Error al actualizar la tabla usuario o producto: " . mysqli_error($conn);
                }
            } else {
                echo "Error al insertar el pedido: " . mysqli_error($conn);
            }
        } else {
            echo "El producto no existe.";
        }
    } else {
        echo "Error al consultar el producto: " . mysqli_error($conn);
    }
}
include("../bd/cerrar_conexion.php");
