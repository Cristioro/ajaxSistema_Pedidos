<?php
include("../bd/abrir_conexion.php");

$documento = $_GET['documento'];
$query = mysqli_query($conn, "SELECT * FROM Usuario WHERE documento= $documento;");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="formulario row">
            <div class="col-md-4 offset-md-4">
                <center><h1>Usuario <?php echo $row['nombre'] ?></h1></center>
                <form>
                    <div class="mb-3">
                        <label for="documento">Documento</label>
                        <input type="number" name="documento" class="form-control" id="documento" value="<?php echo $row['documento'] ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion" value="<?php echo $row['direccion'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" class="form-control" id="correo" value="<?php echo $row['correo'] ?>">
                    </div>
                    <center>
                        <input type="button" value="Actualizar" class="btn btn-success" onclick="actualizar();">
                        <a href="admin.php"><button class="btn btn-danger" type="button">Cancelar Cambio</button></a>
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
