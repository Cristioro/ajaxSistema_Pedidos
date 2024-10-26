<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Registro</h2>
        <form id="registerForm" class="p-4 border rounded bg-white">
            <div class="mb-3">
                <label for="registerDocumento" class="form-label">Documento</label>
                <input type="number" id="registerDocumento" name="registerDocumento" class="form-control" placeholder="Documento" required>
            </div>
            <div class="mb-3">
                <label for="registerNombre" class="form-label">Nombre</label>
                <input type="text" id="registerNombre" name="registerNombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="registerDireccion" class="form-label">Dirección</label>
                <input type="text" id="registerDireccion" name="registerDireccion" class="form-control" placeholder="Dirección">
            </div>
            <div class="mb-3">
                <label for="registerCorreo" class="form-label">Correo</label>
                <input type="email" id="registerCorreo" name="registerCorreo" class="form-control" placeholder="Correo" required>
            </div>
            <div class="mb-3">
                <label for="registerContrasena" class="form-label">Contraseña</label>
                <input type="password" id="registerContrasena" name="registerContrasena" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="button" class="btn btn-primary w-100" onclick="register()">Registrarse</button>
            <div id="registerMessage" class="text-center mt-3"></div>
        </form>
        <p class="text-center mt-3">¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
