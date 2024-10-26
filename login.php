<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión</h2>
        <form class="p-4 border rounded bg-white">
            <div class="mb-3">
                <label for="loginCorreo" class="form-label">Correo</label>
                <input type="email" id="loginCorreo" name="loginCorreo" class="form-control" placeholder="Correo" required>
            </div>
            <div class="mb-3">
                <label for="loginContrasena" class="form-label">Contraseña</label>
                <input type="password" id="loginContrasena" name="loginContrasena" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="button" class="btn btn-primary w-100" onclick="login()">Iniciar Sesión</button>
            <div id="loginMessage" class="text-center mt-3"></div>
        </form>
        <p class="text-center mt-3">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
