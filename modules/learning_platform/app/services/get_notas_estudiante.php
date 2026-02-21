<?php
require_once "../../../config/session.php";
require_once "../../controllers/DashboardController.php";

$controller = new DashboardController();

$estudiante_id = $_GET['estudiante_id'];
$curso_grado_docente_id = $_GET['cgd_id'] ?? null;

$notas = $controller->getNotasEstudiante($estudiante_id, $curso_grado_docente_id);
echo json_encode($notas);