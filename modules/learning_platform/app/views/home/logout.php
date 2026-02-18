<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = [];

// Destruir la sesión
session_destroy();

// Eliminar cookie de recordar usuario si existe
if (isset($_COOKIE["usuario_recordado"])) {
    setcookie("usuario_recordado", "", time() - 3600, "/");
}

// Redirigir al login
header("Location: login.php");
exit;
?>