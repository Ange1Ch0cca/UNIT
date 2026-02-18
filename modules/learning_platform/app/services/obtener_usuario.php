<?php
require_once '../controllers/DashboardController.php';

header('Content-Type: application/json');

$controller = new DashboardController();

if(!isset($_GET['id'])){
    echo json_encode(["error" => "ID no recibido"]);
    exit;
}

$id = $_GET['id'];

$usuario = $controller->getUsuarioPorId($id);

if(!$usuario){
    echo json_encode(["error" => "Usuario no encontrado"]);
    exit;
}

echo json_encode($usuario);
