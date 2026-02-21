<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";

$database = new Database();
$conn = $database->conectar();

$curso = $_POST['curso_grado_docente_id'];
$nombre = $_POST['nombre'];

$sql = "INSERT INTO tipos_calificacion 
(curso_grado_docente_id,nombre,estado)
VALUES (?,?,1)";

$stmt = $conn->prepare($sql);
$stmt->execute([$curso,$nombre]);

echo json_encode(["success"=>true]);