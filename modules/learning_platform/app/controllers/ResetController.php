<?php
require_once __DIR__ . "/../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'] ?? 'salon';

    $database = new Database();
    $conn = $database->conectar();

    $mensaje = "Solicitud de recuperación vía " . $tipo;

    $stmt = $conn->prepare("
        INSERT INTO solicitudes_reset (usuario, nombre_completo, mensaje, tipo)
        VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([$usuario, $nombre, $mensaje, $tipo]);

    echo "OK";
}
