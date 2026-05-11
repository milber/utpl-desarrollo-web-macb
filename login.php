<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al Sistema</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .hidden { display: none; }
        .card { border-radius: 15px; border: none; }
        .btn-primary { background-color: #0d6efd; }
        .btn-success { background-color: #198754; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            
            <?php if(isset($_GET['status'])): ?>
                <div class="mb-3">
                    <?php
                    switch($_GET['status']) {
                        case 'reg_success':
                            echo '<div class="alert alert-success">¡Registro exitoso! Ya puedes ingresar.</div>';
                            break;
                        case 'login_error':
                            echo '<div class="alert alert-danger">Correo o contraseña incorrectos.</div>';
                            break;
                        case 'reg_error':
                            echo '<div class="alert alert-danger">Error al registrar. Los datos podrían estar duplicados.</div>';
                            break;
                        case 'pass_short':
                            echo '<div class="alert alert-warning">La contraseña debe tener al menos 6 caracteres.</div>';
                            break;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="card shadow-lg">
                <div class="card-body p-4">
                    
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
                            <a href="#" class="text-decoration-none fw-bold" onclick="toggleForms()">Regístrate aquí</a>
                        </div>
                    </div>

                    <div id="register-form" class="hidden">
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
                                <div id="error-pass" class="text-danger small mt-1" style="display:none;">Las contraseñas no coinciden.</div>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg w-100 shadow-sm mt-2">Crear Cuenta</button>
                        </form>
                        <div class="text-center mt-4">
                            <span class="text-muted small">¿Ya tienes cuenta?</span> 
                            <a href="#" class="text-decoration-none fw-bold" onclick="toggleForms()">Inicia Sesión</a>
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
    function toggleForms() {
        const login = document.getElementById('login-form');
        const registro = document.getElementById('register-form');
        
        login.classList.toggle('hidden');
        registro.classList.toggle('hidden');
    }

    function validateRegistration() {
        const pass = document.getElementById('reg_pass').value;
        const confirm = document.getElementById('reg_pass_confirm').value;
        const errorDiv = document.getElementById('error-pass');

        if (pass !== confirm) {
            errorDiv.style.display = 'block';
            return false;
        }
        errorDiv.style.display = 'none';
        return true;
    }
</script>

</body>
</html>