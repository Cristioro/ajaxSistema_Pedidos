<?php
include("../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM usuario");

while ($user = mysqli_fetch_array($query)) {
    echo "
        <table width=\"370px\" border=\"1\" class=\"table\">
            <tr>
                <td>" . $user['documento'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['nombre'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['direccion'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['correo'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['id_pedido'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['admin'] . "</td>
                
                <td><a href='CRUD/Delete.php?documento=" . $user['documento'] . "'>
                    <button type='button' class='btn btn-outline-danger' onclick='return confirmar()'>Eliminar</button></a></td>
                <td><a href='update_page.php?documento=" . $user['documento'] . "'>
                    <button type='button' class='btn btn-outline-primary'>Actualizar</button></a></td>
            </tr>
        </table>
    ";
}

include("../bd/cerrar_conexion.php");
