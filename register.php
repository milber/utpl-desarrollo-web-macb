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

        // Validación de varios campos
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

        try {
            $sql = "INSERT INTO usuarios (nombre, cedula, correo, clave_segura) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $nombre, $cedula, $correo, $secure_password);
            $stmt->execute();

            header("Location: login.php?status=reg_success");
            exit();

        } catch (mysqli_sql_exception $e) {
            // El código 1062 indica entrada duplicada
            if ($e->getCode() === 1062) {
                header("Location: login.php?error=cedula_duplicada");
            } else {
                header("Location: login.php?error=reg_error");
            }
            exit();
        }
    }
}

$conn->close();