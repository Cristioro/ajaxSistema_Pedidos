<?php
include("../../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM Pedido");

if ($query) {
    echo "<table width='370px' border='1' class='table'>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Producto</th>
                    <th>Valor Total</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>";

    while ($user = mysqli_fetch_array($query)) {
        echo "<tr>
                <td>" . $user['id_pedido'] . "</td>
                <td>" . $user['producto'] . "</td>
                <td>" . $user['valor_total'] . "</td>
                <td>" . $user['cantidad'] . "</td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

include("../../bd/cerrar_conexion.php");