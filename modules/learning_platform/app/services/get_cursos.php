<?php
require_once "../controllers/DashboardController.php";

if (!isset($_GET['grado_id'])) {
    echo json_encode([]);
    exit;
}

$grado_id = $_GET['grado_id'];

$controller = new DashboardController();
$cursos = $controller->getCursosPorGrado($grado_id);

echo json_encode($cursos);