<?php
include("../../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM pedido");

while ($user = mysqli_fetch_array($query)) {
    echo "
        <table width=\"370px\" border=\"1\" class=\"table\">
            <tr>
                <td>" . $user['id_pedido'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['producto'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['valor_total'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['cantidad'] . "</td>
            </tr>
        </table>
    ";
}

include("../../bd/cerrar_conexion.php");
