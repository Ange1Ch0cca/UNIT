<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";

$database = new Database();
$conn = $database->conectar();

$data = json_decode($_POST['notas'], true);

foreach($data as $nota){

    $estudiante_id = $nota['estudiante_id'];
    $curso_grado_docente_id = $nota['curso_grado_docente_id'];
    $valor = $nota['valor'] ?? null;
    $tipo_calificacion_id = $nota['tipo_calificacion_id'] ?? null;
    $observacion = $nota['observacion'] ?? null;

    if($tipo_calificacion_id){

        $sql = "INSERT INTO calificaciones
(estudiante_id, curso_grado_docente_id, tipo_calificacion_id, fecha, valor_numerico, observacion)
VALUES (?,?,?,?,?,?)
ON DUPLICATE KEY UPDATE
valor_numerico = VALUES(valor_numerico),
observacion = VALUES(observacion),
fecha_modificacion = NOW()";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $estudiante_id,
            $curso_grado_docente_id,
            $tipo_calificacion_id,
            $valor
        ]);
    }

    if($observacion){
        $sqlObs = "INSERT INTO calificaciones
                (estudiante_id, curso_grado_docente_id, observacion, fecha)
                VALUES (?,?,?,NOW())";

        $stmtObs = $conn->prepare($sqlObs);
        $stmtObs->execute([
            $estudiante_id,
            $curso_grado_docente_id,
            $observacion
        ]);
    }
}

echo json_encode(["success"=>true]);