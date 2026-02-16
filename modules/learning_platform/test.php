<?php
require_once "config/database.php";

$db = new Database();
$conexion = $db->conectar();

echo "Conexión PDO exitosa";
