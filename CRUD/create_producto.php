<?php
include("../bd/abrir_conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare("INSERT INTO producto (nombre, precio, cantidad) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $nombre, $precio, $cantidad);

    if ($stmt->execute()) {
        echo "Producto creado exitosamente.";
    } else {
        echo "Error: No se pudo crear el producto.";
    }

    $stmt->close();
    include("../bd/cerrar_conexion.php");
}
