<?php
require_once "../../config/database.php";
require_once "DashboardController.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST["id"];
    $estado = $_POST["estado"];

    $database = new Database();
    $conn = $database->conectar();

    $controller = new DashboardController($conn);
    $controller->cambiarEstadoGrado($id, $estado);

    echo "ok";
}
