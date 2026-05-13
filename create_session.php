<?php
// create_session.php
session_start();
require_once 'connection_db.php';

// validation of credentials
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'login') {
    
    $correo = trim($_POST['correo'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($correo) || empty($password)) {
        header("Location: login.php?error=campos_vacios");
        exit();
    }

    $sql = "SELECT id_usuario, nombre, clave_segura FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($usuario = $resultado->fetch_assoc()) {
        // Verificamos el hash almacenado en 'clave_segura'
        if (password_verify($password, $usuario['clave_segura'])) {
            
            // 2. Lógica de Creación de Sesión (Consolidada aquí)
            session_regenerate_id(true); 
            $_SESSION['user_id'] = $usuario['id_usuario'];
            $_SESSION['user_name'] = $usuario['nombre'];
            $_SESSION['start_time'] = time();

            // Redirección exitosa
            header("Location: perfil.php");
            exit();
        }
    }

    header("Location: login.php?error=invalid_credentials");
    exit();
}


function protect_page() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}
