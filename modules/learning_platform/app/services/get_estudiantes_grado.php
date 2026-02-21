<?php
header('Content-Type: application/json');
require_once "../../config/database.php";
session_start();

$grado_id = $_GET['grado_id'] ?? null;

if (!$grado_id) {
    echo json_encode(["success" => false, "error" => "Parámetros incompletos", "data" => []]);
    exit;
}

try {
    $database = new Database();
    $conn = $database->conectar();

    $sql = "SELECT 
                e.id AS estudiante_id,
                u.nombres,
                u.apellidos
            FROM estudiantes e
            INNER JOIN usuarios u ON e.usuario_id = u.id
            WHERE e.grado_id = ?
            ORDER BY u.apellidos ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$grado_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["success" => true, "error" => null, "data" => $result]);

} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => $e->getMessage(), "data" => []]);
}