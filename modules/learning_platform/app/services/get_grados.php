<?php
require_once "../controllers/DashboardController.php";

if (!isset($_GET['anio'])) {
    echo json_encode([]);
    exit;
}

$anio = $_GET['anio'];

$controller = new DashboardController();
$grados = $controller->getGradosPorAnio($anio);

echo json_encode($grados);