<?php
require_once '../controllers/DashboardController.php';

$controller = new DashboardController();

$id = $_POST['id'];

$resultado = $controller->inactivarUsuario($id);

if($resultado){
    echo "ok";
}else{
    echo "error";
}
