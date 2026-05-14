<?php
    if (isset($_GET['error'])) {
        $mensaje = "";
        $tipo = "danger"; // Color rojo de Bootstrap

        switch ($_GET['error']) {
            case 'campos_vacios':
                $mensaje = "<strong>¡Atención!</strong> Por favor, llena todos los campos.";
                break;
            case 'invalid_credentials':
                $mensaje = "<strong>Error:</strong> Correo o contraseña incorrectos.";
                break;
            case 'reg_error':
                $mensaje = "<strong>Error:</strong> No se pudo crear la cuenta. Intenta de nuevo.";
                break;
            default:
                $mensaje = "Ocurrió un error inesperado.";
        }

        if ($mensaje !== "") {
            echo '
            <div class="alert alert-' . $tipo . ' alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> ' . $mensaje . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }

    if (isset($_GET['status']) && $_GET['status'] === 'reg_success') {
        echo '
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <strong>¡Éxito!</strong> Tu cuenta ha sido creada. Ya puedes iniciar sesión.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
?>