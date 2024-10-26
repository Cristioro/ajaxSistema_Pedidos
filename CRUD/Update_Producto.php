<?php
include("../bd/abrir_conexion.php");

$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

// Actualizar el producto
$query = "UPDATE producto SET nombre = ?, precio = ?, cantidad = ? WHERE id_producto = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sdii", $nombre, $precio, $cantidad, $id_producto);

if ($stmt->execute()) {
    echo "Producto actualizado correctamente.";
} else {
    echo "Error al actualizar el producto.";
}

$stmt->close();
include("../bd/cerrar_conexion.php");
