<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['rol'])) {

    // Detecta automáticamente el dominio
    //modificar la parate de la ruta cuando se suba a un hosting y hacer pruebas para verificar que funcione correctamente la redirección
    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/modules/learning_platform/app/views/home/login.php";

    header("Location: " . $base_url);
    exit;
}
