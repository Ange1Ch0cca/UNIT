<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";

$database = new Database();
$conn = $database->conectar();

$id = $_POST['id'];

$conn->prepare("DELETE FROM tipos_calificacion WHERE id=?")
     ->execute([$id]);

echo json_encode(["success"=>true]);