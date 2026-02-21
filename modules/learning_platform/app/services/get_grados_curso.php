<?php
header('Content-Type: application/json');
require_once "../../config/database.php";
require_once "../../config/session.php";

$curso_grado_docente_id = $_GET['curso_grado_docente_id'] ?? null;

if (!$curso_grado_docente_id) {
    echo json_encode(["success"=>false,"error"=>"ID no recibido","data"=>[]]);
    exit;
}

try {
    $database = new Database();
    $conn = $database->conectar();

    $sql = "SELECT 
                g.id AS grado_id,
                g.nombre_grado,
                g.seccion
            FROM curso_grado_docente cgd
            INNER JOIN grados g ON g.id = cgd.grado_id
            WHERE cgd.id = ?
            AND cgd.estado = 1";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$curso_grado_docente_id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "success"=>true,
        "error"=>null,
        "data"=>$result
    ]);

} catch(PDOException $e){
    echo json_encode([
        "success"=>false,
        "error"=>$e->getMessage(),
        "data"=>[]
    ]);
}