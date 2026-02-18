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

            // ==============================
            // LIMPIEZA Y NORMALIZACIÓN
            // ==============================
            $datos["nombres"]   = strtoupper(trim($datos["nombres"]));
            $datos["apellidos"] = strtoupper(trim($datos["apellidos"]));
            $datos["dni"]       = strtoupper(trim($datos["dni"]));
            $datos["password"]  = trim($datos["password"]);

            // ==============================
            // VALIDAR CONTRASEÑA SEGURA
            // ==============================
            $password = $datos["password"];

            if (
                strlen($password) < 8 ||
                !preg_match('/[A-Z]/', $password) ||
                !preg_match('/[0-9]/', $password)
            ) {
                return "password_insegura";
            }

            // ==============================
            // VERIFICAR SI DNI YA EXISTE
            // ==============================
            $sql = "SELECT id FROM usuarios WHERE dni = :dni";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(":dni", $datos["dni"]);
            $stmt->execute();

            if ($stmt->fetch()) {
                return "dni_existe";
            }

            // ==============================
            // GENERAR USUARIO AUTOMÁTICO
            // ==============================
            $nombres = explode(" ", $datos["nombres"]);
            $primerNombre = strtolower($nombres[0]);

            $apellidos = explode(" ", $datos["apellidos"]);
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

            // ==============================
            // ENCRIPTAR CONTRASEÑA
            // ==============================
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            // ==============================
            // INSERTAR ALUMNO
            // ==============================
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
