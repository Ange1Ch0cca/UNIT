<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    http_response_code(403);
    exit("Acceso denegado");
}

require_once __DIR__ . "/../../config/database.php";

$database = new Database();
$conn = $database->conectar();

$stmt = $conn->query("
    SELECT *
    FROM solicitudes_reset
    WHERE estado = 0
    OR (estado = 1 AND fecha_leido >= NOW() - INTERVAL 24 HOUR)
    ORDER BY fecha_solicitud DESC
");

$solicitudes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($solicitudes);
