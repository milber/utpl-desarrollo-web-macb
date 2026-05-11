<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>.hidden { display: none; }</style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <!-- Manejo de mensajes desde la URL -->
            <?php if(isset($_GET['status'])): ?>
                <?php if($_GET['status'] == 'reg_success'): ?>
                    <div class="alert alert-success">Registro exitoso. Inicia sesión.</div>
                <?php elseif($_GET['status'] == 'login_error'): ?>
                    <div class="alert alert-danger">Credenciales incorrectas.</div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="card shadow">
                <div class="card-body">
                    <!-- LOGIN -->
                    <div id="login-form">
                        <h3 class="text-center">Login</h3>
                        <form action="procesar.php" method="POST">
                            <input type="hidden" name="accion" value="login">
                            <div class="mb-3"><label>Correo</label><input type="email" name="correo" class="form-control" required></div>
                            <div class="mb-3"><label>Clave</label><input type="password" name="password" class="form-control" required></div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                        <p class="text-center mt-3">¿No tienes cuenta? <a href="#" onclick="toggle()">Regístrate</a></p>
                    </div>

                    <!-- REGISTRO -->
                    <div id="register-form" class="hidden">
                        <h3 class="text-center">Registro</h3>
                        <form action="procesar.php" method="POST">
                            <input type="hidden" name="accion" value="registro">
                            <div class="mb-3"><label>Cédula</label><input type="text" name="cedula" class="form-control" required></div>
                            <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control" required></div>
                            <div class="mb-3"><label>Correo</label><input type="email" name="correo" class="form-control" required></div>
                            <div class="mb-3"><label>Clave</label><input type="password" name="password" class="form-control" required></div>
                            <button type="submit" class="btn btn-success w-100">Registrarme</button>
                        </form>
                        <p class="text-center mt-3">¿Ya tienes cuenta? <a href="#" onclick="toggle()">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function toggle() {
        document.getElementById('login-form').classList.toggle('hidden');
        document.getElementById('register-form').classList.toggle('hidden');
    }
</script>
</body>
</html>