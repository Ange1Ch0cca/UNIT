<?php
require_once __DIR__ . "/../../config/database.php";

class AuthController
{

    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->conectar();
    }

    public function login($usuario, $password)
    {

        $sql = "SELECT u.*, r.nombre AS rol 
                FROM usuarios u
                INNER JOIN roles r ON u.rol_id = r.id
                WHERE u.usuario = :usuario AND u.estado = 1";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {

            session_start();

            $_SESSION['id'] = $user['id'];
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['rol'] = $user['rol'];
            $_SESSION['nombres'] = $user['nombres'];

            return true;
        } else {
            return false;
        }
    }

    public function register($datos)
    {
        try {

            // Verificar si DNI ya existe
            $sql = "SELECT id FROM usuarios WHERE dni = :dni";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":dni", $datos["dni"]);
            $stmt->execute();

            if ($stmt->fetch()) {
                return "dni_existe";
            }

            // Generar usuario automático
            $nombres = explode(" ", trim($datos["nombres"]));
            $primerNombre = strtolower($nombres[0]);

            $apellidos = explode(" ", trim($datos["apellidos"]));
            $primerApellido = strtolower($apellidos[0]);

            $baseUsuario = substr($primerNombre, 0, 1) . $primerApellido;
            $usuario = $baseUsuario;

            // Verificar duplicados de usuario
            $contador = 1;
            while (true) {

                $sql = "SELECT id FROM usuarios WHERE usuario = :usuario";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindParam(":usuario", $usuario);
                $stmt->execute();

                if (!$stmt->fetch()) {
                    break;
                }

                $usuario = $baseUsuario . $contador;
                $contador++;
            }

            // Encriptar contraseña
            $passwordHash = password_hash($datos["password"], PASSWORD_DEFAULT);

            // Insertar alumno
            $sql = "INSERT INTO usuarios 
                (usuario, dni, nombres, apellidos, password, rol_id, estado) 
                VALUES 
                (:usuario, :dni, :nombres, :apellidos, :password, 3, 1)";

            $stmt = $this->conexion->prepare($sql);

            $stmt->bindParam(":usuario", $usuario);
            $stmt->bindParam(":dni", $datos["dni"]);
            $stmt->bindParam(":nombres", $datos["nombres"]);
            $stmt->bindParam(":apellidos", $datos["apellidos"]);
            $stmt->bindParam(":password", $passwordHash);

            if ($stmt->execute()) {
                return ["ok", $usuario];
            }

            return "error";
        } catch (PDOException $e) {
            return "error";
        }
    }
}
