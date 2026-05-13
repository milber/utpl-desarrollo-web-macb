<?php
require_once 'create_session.php';
protect_page(); // Esto verifica que el usuario pasó por el login exitosamente
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4 rounded-4">
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>
            <p class="text-muted">Has ingresado correctamente a tu panel personal.</p>
            <hr>
            <a href="logout.php" class="btn btn-outline-danger">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html> 