<?php
include("../../bd/abrir_conexion.php");

$query = mysqli_query($conn, "SELECT * FROM Usuario");

if ($query) {
    echo "<table width='370px' border='1' class='table'>
            <thead>
                <tr>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>ID Pedido</th>
                    <th>Admin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";

    while ($user = mysqli_fetch_array($query)) {
        echo "<tr>
                <td>" . $user['documento'] . "</td>
                <td>" . $user['nombre'] . "</td>
                <td>" . $user['direccion'] . "</td>
                <td>" . $user['correo'] . "</td>
                <td>" . $user['id_pedido'] . "</td>
                <td>" . ($user['admin'] ? 'Sí' : 'No') . "</td>
                <td>
                    <a href='../CRUD/Delete.php?documento=" . $user['documento'] . "'>
                        <button type='button' class='btn btn-outline-danger' onclick='return confirmar()'>Eliminar</button>
                    </a>
                    <a href='Update_page.php?documento=" . $user['documento'] . "'>
                        <button type='button' class='btn btn-outline-primary'>Actualizar</button>
                    </a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "Error en la consulta: " . mysqli_error($conn);
}

include("../../bd/cerrar_conexion.php");