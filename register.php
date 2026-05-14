<?php
require_once 'connection_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar la acción de post
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'record') {
        $nombre   = htmlspecialchars(trim($_POST['nombre']));
        $cedula   = htmlspecialchars(trim($_POST['cedula']));
        $correo   = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Validación de varios
        if (empty($nombre) || empty($correo) || empty($password)) {
            header("Location: login.php?status=reg_error");
            exit();
        }

        if (strlen($password) < 6) {
            header("Location: login.php?status=pass_short");
            exit();
        }

        // Encriptar la clave
        $secure_password = password_hash($password, PASSWORD_DEFAULT);


        // Insertar el registro
        $sql = "INSERT INTO usuarios (nombre, cedula, correo, clave_segura) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $cedula, $correo, $secure_password);

            if ($stmt->execute()) {
                header("Location: login.php?status=reg_success");
            } else {
                // redirección de error
                header("Location: login.php?status=reg_error");
            }
            $stmt->close();
        } else {
            // redirección de error
            header("Location: login.php?status=reg_error");
        }
    }
}

$conn->close();