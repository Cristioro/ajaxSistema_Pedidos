<?php
session_start();

if (!isset($_SESSION['correo'])) {
    // Si no hay sesión iniciada, redirigir al login
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
        <p>Esta es la página principal.</p>
        <a href="CRUD/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    <form>
        <!--Campo Documento-->
        <div class="mb-3">
            <label for="documento">Documento</label>
            <input type="text" name="documento" class="form-control" id="documento" value="" readonly>
        </div>
        <!--Campo Nombre-->
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $_SESSION['usuario']; ?>" readonly>
        </div>
        <!--Campo Producto-->
        <div class="mb-3">
            <label for="id_producto">Producto</label>
            <select name="id_producto" id="id_producto" class="form-select" onchange="buscar_datos();">
                <!-- Opciones del producto irán aquí -->
            </select>
        </div>
        <!--Campo Precio-->
        <div class="mb-3">
            <label for="precio">Precio</label>
            <input type="text" name="precio" class="form-control" id="precio">
        </div>
        <!--Campo Cantidad-->
        <div class="mb-3">
            <label for="cantidad">Cantidad <p class="text-center mt-3 text-danger" id="showCantidad"></p></label>
            <input type="number" name="cantidad" class="form-control" id="cantidad">
        </div>
        <!--Botones-->
        <center>
            <input type="button" value="GUARDAR" class="btn btn-success" name="btn_enviar" onclick="guardar();">
            <input type="button" value="CANCELAR" class="btn btn-danger" name="btn_cancelar" onclick="limpiar();">
        </center>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
    <script src="CRUD/Js/option.js"></script>
</body>
</html>
