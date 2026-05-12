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
                            <button type="button" class="btn btn-link text-decoration-none fw-bold" data-bs-toggle="collapse" data-bs-target=".multi-collapse">Regístrate aquí</button>
                        </div>
                    </div>

                    <!-- Register Form -->
                    <div class="collapse multi-collapse" id="register-form">
                        <h3 class="text-center mb-4 fw-bold">Nueva Cuenta</h3>
                        <form action="procesar.php" method="POST">
                            <input type="hidden" name="accion" value="registro">
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">NOMBRE</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CORREO</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-secondary small fw-bold">CONTRASEÑA</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 shadow-sm">Crear Cuenta</button>
                        </form>
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-link text-decoration-none fw-bold" data-bs-toggle="collapse" data-bs-target=".multi-collapse">Inicia Sesión</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ESTO ES LO QUE ESTÁ FALLANDO SEGÚN TU LOG -->
<script src="js/bootstrap.min.js"></script>

</body>
</html>