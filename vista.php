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
          <!--Campo Id-->
          <div class="mb-3">
            <label for="id">ID</label>
            <input type="number" name="id" class="form-control" id="id" onblur="buscar_datos();">
          </div>
          <!--Campo Nombre-->
          <div class="mb-3">
            <label for="nombre">Nombre </label>
            <input type="text" name="nombre" class="form-control" id="nombre">
          </div>
          <!--Campo Cantidad-->
          <div class="mb-3">
            <label for="cantidad">Cantidad </label>
            <input type="text" name="cantidad" class="form-control" id="cantidad">
          </div>
          <!--Campo Precio-->
          <div class="mb-3">
            <label for="precio">precio </label>
            <input type="text" name="Id" class="form-control" id="precio">
          </div>
          <!--Botones-->
          <center>
            <input type="submit" value="GUARDAR" class="btn btn-success" name="btn_enviar" id="btn_enviar" onclick="guardar();">
            <input type="button" value="CANCELAR" class="btn btn-danger" name="btn_cancelar" onclick="limpiar();">
          </center>
        </form>
</body>
</html>