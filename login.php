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
                    
                    <!-- Login Form -->
                    <div class="collapse show multi-collapse" id="login-form">
                        <h3 class="text-center mb-4 fw-bold">Bienvenido</h3>
                        <form action="procesar.php" method="POST">
                            <input type="hidden" name="accion" value="login">
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CORREO ELECTRÓNICO</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONTRASEÑA</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 shadow-sm">Entrar</button>
                        </form>
                        <div class="text-center mt-4">
                            <span class="text-muted small">¿No tienes cuenta?</span><br>
                            <button type="button" class="btn btn-link text-decoration-none fw-bold" data-bs-toggle="collapse" data-bs-target=".multi-collapse">Regístrate aquí</button>
                        </div>
                    </div>

                    <!-- Register Form -->
                    <div class="collapse multi-collapse" id="register-form">
                        <h3 class="text-center mb-4 fw-bold">Nueva Cuenta</h3>
                        <form action="register.php" method="POST" onsubmit="return validatePasswords()">
                            <input type="hidden" name="accion" value="record">
                            
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">NOMBRE</label>
                                <input type="text"
                                        name="nombre"
                                        class="form-control"
                                        required
                                        oninvalid="this.setCustomValidity('Por favor, ingrese un nombre')"
                                        oninput="this.setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CÉDULA</label>
                                <input type="text"
                                        name="cedi;a"
                                        class="form-control"
                                        required
                                        oninvalid="this.setCustomValidity('Por favor, ingrese la cédula')"
                                        oninput="this.setCustomValidity('')">
                            </div>


                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CORREO</label>
                                <input type="email"
                                        name="correo"
                                        class="form-control"
                                        required
                                        oninvalid="this.setCustomValidity('Por favor, ingrese un correo válido')"
                                        oninput="this.setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONTRASEÑA</label>
                                <input type="password"
                                        id="reg_password"
                                        name="password"
                                        class="form-control"
                                        required
                                        oninvalid="this.setCustomValidity('Por favor, ingresa una contraseña')"
                                        oninput="this.setCustomValidity('')">
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONFIRMAR CONTRASEÑA</label>
                                <input type="password"
                                        id="confirm_password"
                                        class="form-control"
                                        required
                                        oninvalid="this.setCustomValidity('Por favor, confirme su contraseña')"
                                        oninput="this.setCustomValidity('')">
                                <div id="password-error" class="text-danger small mt-1 d-none">Las contraseñas no coinciden.</div>
                            </div>

                            <button type="submit" class="btn btn-success w-100 shadow-sm">Crear Cuenta</button>
                        </form>
                        <div class="text-center mt-4">
                            <span class="text-muted small">¿Ya tienes cuenta?</span><br>
                            <button type="button" class="btn btn-link text-decoration-none fw-bold" data-bs-toggle="collapse" data-bs-target=".multi-collapse">Inicia Sesión</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/bootstrap.min.js"></script>

<script>
    function validatePasswords() {
        const password = document.getElementById('reg_password').value;
        const confirm = document.getElementById('confirm_password').value;
        const errorElement = document.getElementById('password-error');

        if (password !== confirm) {
            errorElement.classList.remove('d-none');
            return false;
        }
        
        errorElement.classList.add('d-none');
        return true;
    }
</script>

</body>
</html>