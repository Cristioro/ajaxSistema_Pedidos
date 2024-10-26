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
            <div class="mt-5 d-flex flex-row">
                <input type="button" value="Listar Usuarios" onclick="listarUsuarios();" class="btn btn-warning me-3" id="BtnListUsuarios"><br><br>
                <input type="button" value="Listar Productos" onclick="listarProductos();" class="btn btn-warning me-3" id="BtnListProductos"><br><br>
                <input type="button" value="Listar Pedidos" onclick="listarPedidos();" class="btn btn-warning me-3" id="BtnListPedidos"><br><br>
                <a href="create_product_page.php" class="btn btn-primary">Crear Producto</a><br><br>
            </div>
            <div>
                <table width="370px" border="1" class="table mt-3" id="TheadUsuarios" style="display: none;">
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
                    <tbody id="mostrar_mensajeUsuarios">

                    </tbody>
                </table>
            </div>
            <div>
                <table width="370px" border="1" class="table mt-3" id="TheadProductos" style="display: none;">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Eliminar</th>
                            <th scope="col">Actualizar</th>
                        </tr>
                    </thead>
                    <tbody id="mostrar_mensajeProductos">

                    </tbody>
                </table>
            </div>
            <div>
                <table width="370px" border="1" class="table mt-3" id="TheadPedidos" style="display: none;">
                    <thead>
                        <tr>
                            <th scope="col">Id Pedido</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody id="mostrar_mensajePedidos">

                    </tbody>
                </table>
            </div>
            <div class="container my-4">
                <button onclick="mostrarPedidoMayor()" class="btn btn-primary me-2">Mostrar Pedido Mayor</button>
                <button onclick="mostrarPedidoMenor()" class="btn btn-secondary">Mostrar Pedido Menor</button>

                <div id="resultadoPedido" class="mt-3 alert alert-info" role="alert">
                    <!-- Aquí se mostrará el resultado -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../script.js"></script>
    <script src="../CRUD/Js/read.js"></script>
    <script>
        function confirmar() {
            return confirm("¿Estás seguro de que deseas eliminar?");
        }
    </script>
</body>

</html>