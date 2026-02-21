<?php
header('Content-Type: application/json');
require_once "../../config/database.php";

try {
    if(!isset($_GET['curso_grado_docente_id'])){
        echo json_encode(["success"=>false, "error"=>"Falta curso_grado_docente_id"]);
        exit;
    }

    $curso_grado_docente_id = $_GET['curso_grado_docente_id'];

    $database = new Database();
    $conn = $database->conectar();

    $sql = "SELECT id, nombre, valor_maximo
            FROM tipos_calificacion
            WHERE curso_grado_docente_id = ?
            AND estado = 1
            ORDER BY id ASC";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$curso_grado_docente_id]);

    $tipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["success"=>true, "data"=>$tipos]);

} catch(PDOException $e){
    echo json_encode(["success"=>false, "error"=>$e->getMessage()]);
}