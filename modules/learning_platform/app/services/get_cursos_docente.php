<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once "../../config/database.php";
require_once "../../config/session.php";

$usuario_id = $_SESSION['id'] ?? null;

try {
    $database = new Database();
    $conn = $database->conectar();

    // 1️⃣ Obtener id del docente
    $sqlDocente = "SELECT id FROM docentes WHERE usuario_id = ?";
    $stmtDoc = $conn->prepare($sqlDocente);
    $stmtDoc->execute([$usuario_id]);
    $docente = $stmtDoc->fetch(PDO::FETCH_ASSOC);

    if (!$docente) {
        echo json_encode([
            "success" => false,
            "error" => "El usuario no es docente",
            "data" => []
        ]);
        exit;
    }

    $docente_id = $docente['id'];

    // 2️⃣ Obtener cursos
    $sql = "SELECT 
                c.nombre AS curso,
                g.nombre_grado,
                cgd.id AS curso_grado_docente_id
            FROM curso_grado_docente cgd
            INNER JOIN cursos c ON c.id = cgd.curso_id
            INNER JOIN grados g ON g.id = cgd.grado_id
            WHERE cgd.docente_id = ?
            AND cgd.estado = 1
            ORDER BY g.nombre_grado, c.nombre";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$docente_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "success" => true,
        "error" => null,
        "data" => $result
    ]);

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => $e->getMessage(),
        "data" => []
    ]);
}