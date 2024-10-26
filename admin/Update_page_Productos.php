<?php
include("../bd/abrir_conexion.php");

$id_producto = $_GET['id_producto'];
$query = mysqli_query($conn, "SELECT * FROM producto WHERE id_producto = $id_producto;");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="formulario row">
            <div class="col-md-4 offset-md-4">
                <center><h1>Producto <?php echo $row['nombre'] ?></h1></center>
                <form id="formActualizarProducto">
                    <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $row['id_producto'] ?>">
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="precio">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" id="precio" value="<?php echo $row['precio'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" id="cantidad" value="<?php echo $row['cantidad'] ?>">
                    </div>
                    <center>
                        <button type="button" class="btn btn-success" onclick="actualizarProducto();">Actualizar</button>
                        <a href="admin.php" class="btn btn-danger">Cancelar</a>
                    </center>
                </form>
            </div>
        </div>
        <div class="cargando" style="display: none;">
            <p>Actualizando...</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="../script.js"></script>
</body>
</html>
