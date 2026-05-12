<?php
$host = "localhost";
$user = "macb_app";
$pass = "MacbApp2026!";
$db   = "macb_dw";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");