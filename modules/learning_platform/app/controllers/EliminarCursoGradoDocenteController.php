<?php
require_once "../config/database.php";
require_once "DashboardController.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST["id"];

    $controller = new DashboardController($conn);
    $controller->eliminarAsignacion($id);
}
