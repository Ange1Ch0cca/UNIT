<?php
require_once "../controllers/DashboardController.php";

if (!isset($_GET['cgd_id']) || !isset($_GET['grado_id'])) {
    echo json_encode([]);
    exit;
}

$cgd_id = $_GET['cgd_id'];
$grado_id = $_GET['grado_id'];

$controller = new DashboardController();
$estudiantes = $controller->getEstudiantesConPromedio($cgd_id, $grado_id);

echo json_encode($estudiantes);