<?php
include("../bd/abrir_conexion.php");

$sql = "SELECT MIN(valor_total) AS valor_total FROM Pedido";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'valor_total' => $row['valor_total']]);
} else {
    echo json_encode(['success' => false]);
}

include("../bd/cerrar_conexion.php");