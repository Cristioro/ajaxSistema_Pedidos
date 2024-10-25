<?php
session_start();

// Verificar si el usuario está logueado y si es administrador
if (!isset($_SESSION['correo']) || $_SESSION['admin'] != 1) {
    // Si no está logueado o no es admin, redirigir al login
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div>
            <h2>Panel de Administrador</h2>
            <p>Solo los administradores pueden acceder a esta página.</p>
            <a href="../CRUD/logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>

        <div>
            <div class="mt-5">
                <input type="button" value="Listar Usuarios" onclick="listar();" class="btn btn-warning" id="BtnList"><br><br>
            </div>
            <div>
                <table width="370px" border="1" class="table" id="Thead" style="display: none;">
                    <thead>
                        <tr>
                            <th scope="col">documento</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Id Pedido</th>
                            <th scope="col">Admin</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody id="mostrar_mensaje">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../script.js"></script>
    <script src="../CRUD/Js/read.js"></script>
    <script>
        function confirmar() {
            return confirm("¿Estás seguro de que deseas eliminar este usuario?");
        }
    </script>
</body>

</html>