<?php
session_start();

// ⏳ Tiempo máximo de inactividad (15 minutos = 900 segundos)
$tiempo_inactividad = 900;

// Verificar si existe sesión
if (!isset($_SESSION['id']) || !isset($_SESSION['rol'])) {

    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/modules/learning_platform/app/views/home/login.php";
    header("Location: " . $base_url);
    exit;
}

// Verificar tiempo de última actividad
if (isset($_SESSION['ultima_actividad'])) {

    if (time() - $_SESSION['ultima_actividad'] > $tiempo_inactividad) {

        // Destruir sesión por inactividad
        session_unset();
        session_destroy();

        $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/modules/learning_platform/app/views/home/login.php";
        header("Location: " . $base_url);
        exit;
    }
}

// Actualizar tiempo de última actividad
$_SESSION['ultima_actividad'] = time();