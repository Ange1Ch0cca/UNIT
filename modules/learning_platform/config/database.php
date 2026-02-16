<?php

class Database {

    private $host = "localhost";
    private $db_name = "error_404";
    private $username = "root";
    private $password = "";
    private $charset = "utf8mb4";

    public $conexion;

    public function conectar() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=" . $this->charset;

        $opciones = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->conexion = new PDO($dsn, $this->username, $this->password, $opciones);
            return $this->conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
