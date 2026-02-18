<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    http_response_code(403);
    exit("Acceso denegado");
}

require_once __DIR__ . "/../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];

    $database = new Database();
    $conn = $database->conectar();

    $stmt = $conn->prepare("
        UPDATE solicitudes_reset
        SET estado = 1,
            fecha_leido = NOW()
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    echo "OK";
}
