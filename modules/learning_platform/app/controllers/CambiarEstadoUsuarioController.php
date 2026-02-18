<?php
require_once '../controllers/DashboardController.php';

if (!isset($_POST['id']) || !isset($_POST['estado'])) {
    echo "Datos incompletos";
    exit;
}

$id = $_POST['id'];
$estado = $_POST['estado'];

$controller = new DashboardController();

$resultado = $controller->actualizarEstadoUsuario($id, $estado);

if ($resultado) {
    echo "ok";
} else {
    echo "error";
}
