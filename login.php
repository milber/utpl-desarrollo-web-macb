<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <?php include 'alertas.php'; ?>

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    
                    <!-- Login -->
                    <div id="login-form">
                        <h3 class="text-center mb-4 fw-bold">Bienvenido</h3>
                        <form action="procesar.php" method="POST">
                            <input type="hidden" name="accion" value="login">
                            
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CORREO ELECTRÓNICO</label>
                                <input type="email" name="correo" class="form-control form-control-lg" placeholder="correo@ejemplo.com" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONTRASEÑA</label>
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="********" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm mt-2">Entrar</button>
                        </form>
                        <div class="text-center mt-4">
                            <span class="text-muted small">¿No tienes cuenta?</span> 
                            <button type="button" class="btn btn-link p-0 text-decoration-none fw-bold" onclick="toggleInterface()">Regístrate aquí</button>
                        </div>
                    </div>

                    <!-- register -->
                    <div id="register-form" class="d-none">
                        <h3 class="text-center mb-4 fw-bold">Nueva Cuenta</h3>
                        <form action="procesar.php" method="POST" onsubmit="return validateRegistration()">
                            <input type="hidden" name="accion" value="registro">
                            
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CÉDULA</label>
                                <input type="text" name="cedula" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">NOMBRE COMPLETO</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CORREO ELECTRÓNICO</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONTRASEÑA</label>
                                <input type="password" name="password" id="reg_pass" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONFIRMAR CONTRASEÑA</label>
                                <input type="password" id="reg_pass_confirm" class="form-control" required>
                                <div id="error-pass" class="text-danger small mt-1 d-none">Las contraseñas no coinciden.</div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm mt-2">Crear Cuenta</button>
                        </form>
                        <div class="text-center mt-4">
                            <span class="text-muted small">¿Ya tienes cuenta?</span> 
                            <button type="button" class="btn btn-link p-0 text-decoration-none fw-bold" onclick="toggleInterface()">Inicia Sesión</button>
                        </div>
                    </div>

                </div>
            </div>
            
            <p class="text-center text-muted mt-4 small">&copy; 2026 Sistema de Gestión UTPL</p>
        </div>
    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>

<script>
    function toggleInterface() {
        const login = document.getElementById('login-form');
        const registro = document.getElementById('register-form');
        
        login.classList.toggle('d-none');
        registro.classList.toggle('d-none');
    }

    function validateRegistration() {
        const pass = document.getElementById('reg_pass').value;
        const confirm = document.getElementById('reg_pass_confirm').value;
        const errorDiv = document.getElementById('error-pass');

        if (pass !== confirm) {
            errorDiv.classList.remove('d-none');
            return false;
        }
        errorDiv.classList.add('d-none');
        return true;
    }
</script>

</body>
</html>