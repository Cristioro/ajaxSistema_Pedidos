<?php
include("bd/abrir_conexion.php");

$id = $_GET['id'];

$query = mysqli_query($conexion, "SELECT * FROM $tabla_db1 WHERE id= $id;");
$row = mysqli_fetch_assoc($query);


?>

<!idTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>idument</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <body>
    <div class="container">

      <div class="formulario row">
        <!-- INICIA LA COLUMNA -->
        <div class="col-md-4 offset-md-4">
          <center>
            <h1>PROPIETARIO</h1>
          </center>

          <form>
            <!--Campo id-->
            <div class="mb-3">
              <label for="id">ID</label>
              <input type="number" name="id" class="form-control" id="id" onblur="buscar_datos();" value="<?php echo $row['id'] ?>" readonly>
            </div>
            <!--Campo Nombre-->
            <div class="mb-3">
              <label for="nombre">Nombre </label>
              <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $row['nombre'] ?>">
            </div>
            <!--Campo cantidad-->
            <div class="mb-3">
              <label for="cantidad">cantidad </label>
              <input type="text" name="cantidad" class="form-control" id="cantidad" value="<?php echo $row['cantidad'] ?>">
            </div>
            <!--Campo precio-->
            <div class="mb-3">
              <label for="Precio">precio </label>
              <input type="text" name="precio" class="form-control" id="precio" value="<?php echo $row['precio'] ?>">
            </div>
            <!--Botones-->
            <center>
              <input type="button" value="GUARDAR" class="btn btn-success" name="btn_enviar" onclick="actualizar();">
              <a href="index.php">
                <button class="btn btn-danger" type="button">Cancelar Cambio</button>
              </a>
            </center>
          </form>

          <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
          <script src="script.js"></script>

  </body>

  </html>