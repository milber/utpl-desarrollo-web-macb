<?php
require_once 'connection_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate action
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'record') {
        $nombre   = trim($_POST['nombre']);
        $cedula   = trim($_POST['cedula']);
        $correo   = trim($_POST['correo']);
        $password = $_POST['password'];

        // Validations
        if (empty($nombre) || empty($correo) || empty($password)) {
            header("Location: login.php?status=reg_error");
            exit();
        }

        if (strlen($password) < 6) {
            header("Location: login.php?status=pass_short");
            exit();
        }

        $secure_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, cedula, correo, clave_segura) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssss", $nombre, $cedula, $correo, $secure_password);

            if ($stmt->execute()) {
                header("Location: login.php?status=reg_success");
            } else {
                header("Location: login.php?status=reg_error");
            }
            $stmt->close();
        } else {
            header("Location: login.php?status=reg_error");
        }
    }
}

$conn->close();