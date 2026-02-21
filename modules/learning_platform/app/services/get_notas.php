<?php
require_once "../controllers/DashboardController.php";

if (!isset($_GET['estudiante_id']) || !isset($_GET['cgd_id'])) {
    echo json_encode([]);
    exit;
}

$estudiante_id = $_GET['estudiante_id'];
$cgd_id = $_GET['cgd_id'];

$controller = new DashboardController();
$notas = $controller->getNotasEstudiante($estudiante_id, $cgd_id);

echo json_encode($notas);