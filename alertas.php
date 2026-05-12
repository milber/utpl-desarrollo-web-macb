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
            case 'update_success':
                echo '<div class="alert alert-success">Perfil actualizado correctamente.</div>';
                break;
            case 'update_error':
                echo '<div class="alert alert-danger">Error al actualizar el perfil.</div>';
                break;
        }
        ?>
    </div>
<?php endif; ?>