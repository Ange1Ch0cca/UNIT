<?php
require_once "../../config/database.php";
require_once "DashboardController.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["id"])) {

        $id = $_POST["id"];

        try {

            // Crear conexión correctamente
            $database = new Database();
            $conn = $database->conectar();

            // Crear controlador pasando la conexión
            $controller = new DashboardController($conn);

            $resultado = $controller->eliminarAsignacion($id);

            if ($resultado) {
                echo "ok";
            } else {
                echo "error";
            }

        } catch (PDOException $e) {
            echo "error";
        }
    }
}