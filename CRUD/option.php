<?php
include("../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM producto");

while ($producto = mysqli_fetch_array($query)) {
    echo "
        <option value=". $producto['id_producto'] .">". $producto['nombre'] ."</option>
    ";
}

include("../bd/cerrar_conexion.php");
