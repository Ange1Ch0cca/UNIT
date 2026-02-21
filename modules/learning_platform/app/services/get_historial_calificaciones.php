<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";

$database = new Database();
$conn = $database->conectar();

$curso_grado_docente_id = $_GET['curso_grado_docente_id'];

$sql = "SELECT 
c.fecha,
u.apellidos,
u.nombres,
tc.nombre AS rubro,
c.valor_numerico,
c.observacion
FROM calificaciones c
INNER JOIN estudiantes e ON c.estudiante_id = e.id
INNER JOIN usuarios u ON e.usuario_id = u.id
INNER JOIN tipos_calificacion tc ON c.tipo_calificacion_id = tc.id
WHERE c.curso_grado_docente_id = ?
ORDER BY c.fecha DESC, u.apellidos";

$stmt = $conn->prepare($sql);
$stmt->execute([$curso_grado_docente_id]);

echo json_encode([
    "success"=>true,
    "data"=>$stmt->fetchAll(PDO::FETCH_ASSOC)
]);