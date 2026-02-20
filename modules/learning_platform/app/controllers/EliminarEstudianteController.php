<?php
require_once "../../config/database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['id'])) {

        $id = $_POST['id'];

        try {

            // 👇 Crear instancia correctamente
            $database = new Database();
            $conexion = $database->conectar();

            $sql = "UPDATE estudiantes SET estado = 0 WHERE id = :id";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "ok";
            } else {
                echo "error";
            }

        } catch (PDOException $e) {
            echo "error";
        }
    }
}