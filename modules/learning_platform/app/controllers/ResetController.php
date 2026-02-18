<?php
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];

    $database = new Database();
    $conn = $database->conectar();

    $mensaje = "Solicita restablecer contraseña en el colegio.";

    $stmt = $conn->prepare("
        INSERT INTO solicitudes_reset (usuario, nombre_completo, mensaje)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([$usuario, $nombre, $mensaje]);

    echo "OK";
}
