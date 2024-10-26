<?php
include("../../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM producto");

while ($user = mysqli_fetch_array($query)) {
    echo "
        <table width=\"370px\" border=\"1\" class=\"table\">
            <tr>
                <td>" . $user['nombre'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['precio'] . "&emsp;&emsp;&emsp;</td>
                <td>" . $user['cantidad'] . "</td>
                
                <td><a href='../CRUD/DeleteProducto.php?id_producto=" . $user['id_producto'] . "'>
                    <button type='button' class='btn btn-outline-danger' onclick='return confirmar()'>Eliminar</button></a></td>
                <td><a href='Update_page_Productos.php?id_producto=" . $user['id_producto'] . "'>
                    <button type='button' class='btn btn-outline-primary'>Actualizar</button></a></td>
            </tr>
        </table>
    ";
}

include("../../bd/cerrar_conexion.php");
