<?php
require_once __DIR__ . "/../../config/database.php";

class DashboardController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conectar();
    }

    // =========================
    // DASHBOARD SEGÚN ROL
    // =========================
    public function contarNoLeidas()
{
    $stmt = $this->conn->query("
        SELECT COUNT(*) AS total
        FROM solicitudes_reset
        WHERE estado = 0
    ");

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

    public function getDashboardData($userId, $rol)
    {
        switch ($rol) {
            case 'admin':
                return $this->getAdminData();

            case 'docente':
                return $this->getDocenteData($userId);

            case 'estudiante':
                return $this->getEstudianteData($userId);

            default:
                return [];
        }
    }

    // =========================
    // ADMIN
    // =========================
    private function getAdminData()
    {
        $data = [];

        // Total estudiantes
        $stmt = $this->conn->query("
            SELECT COUNT(*) AS total
            FROM usuarios u
            JOIN roles r ON u.rol_id = r.id
            WHERE r.nombre = 'estudiante'
        ");
        $data['total_estudiantes'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Total docentes
        $stmt = $this->conn->query("
            SELECT COUNT(*) AS total
            FROM usuarios u
            JOIN roles r ON u.rol_id = r.id
            WHERE r.nombre = 'docente'
        ");
        $data['total_docentes'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Total cursos
        $stmt = $this->conn->query("SELECT COUNT(*) AS total FROM cursos");
        $data['total_cursos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Total actividades
        $stmt = $this->conn->query("SELECT COUNT(*) AS total FROM actividades");
        $data['total_actividades'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Total materiales
        $stmt = $this->conn->query("SELECT COUNT(*) AS total FROM materiales");
        $data['total_materiales'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Total grados
        $stmt = $this->conn->query("SELECT COUNT(*) AS total FROM grados");
        $data['total_grados'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        return $data;
    }

    public function getSolicitudesReset()
    {
        $stmt = $this->conn->query("
        SELECT *
        FROM solicitudes_reset
        WHERE estado = 0
        OR (estado = 1 AND fecha_leido >= NOW() - INTERVAL 24 HOUR)
        ORDER BY fecha_solicitud DESC
    ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // =========================
    // DOCENTE
    // =========================
    private function getDocenteData($userId)
    {
        $data = [];

        // Obtener id real del docente
        $stmt = $this->conn->prepare("
            SELECT id FROM docentes WHERE usuario_id = ?
        ");
        $stmt->execute([$userId]);
        $docente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($docente) {
            $docenteId = $docente['id'];

            // Cursos asignados
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) AS total
                FROM curso_grado_docente
                WHERE docente_id = ?
            ");
            $stmt->execute([$docenteId]);
            $data['total_cursos'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } else {
            $data['total_cursos'] = 0;
        }

        return $data;
    }

    // =========================
    // ESTUDIANTE
    // =========================
    private function getEstudianteData($userId)
    {
        $data = [];

        // Obtener id real del estudiante
        $stmt = $this->conn->prepare("
            SELECT id, grado_id FROM estudiantes WHERE usuario_id = ?
        ");
        $stmt->execute([$userId]);
        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($estudiante) {
            $gradoId = $estudiante['grado_id'];

            // Actividades del grado
            $stmt = $this->conn->prepare("
                SELECT COUNT(*) AS total
                FROM actividades a
                JOIN curso_grado_docente cgd 
                    ON a.curso_grado_docente_id = cgd.id
                WHERE cgd.grado_id = ?
            ");
            $stmt->execute([$gradoId]);
            $data['total_actividades'] = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } else {
            $data['total_actividades'] = 0;
        }

        return $data;
    }

    // =========================
// OBTENER USUARIOS POR ROL
// =========================
public function getUsuariosPorRol($rolId)
{
    $stmt = $this->conn->prepare("
        SELECT 
            id,
            usuario,
            nombres,
            apellidos,
            foto,
            estado
        FROM usuarios
        WHERE rol_id = ?
        ORDER BY id DESC
    ");

    $stmt->execute([$rolId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getUsuarioPorId($id){

    $sql = "SELECT 
                u.id,
                u.usuario,
                u.dni,
                u.nombres,
                u.apellidos,
                u.correo,
                u.celular,
                u.foto,
                u.estado,
                u.fecha_registro,
                r.nombre AS rol,
                e.fecha_ingreso,
                g.nombre_grado,
                g.seccion
            FROM usuarios u
            LEFT JOIN roles r ON u.rol_id = r.id
            LEFT JOIN estudiantes e ON u.id = e.usuario_id
            LEFT JOIN grados g ON e.grado_id = g.id
            WHERE u.id = ?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$id]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($usuario){

        if($usuario['estado'] == 1){
            $usuario['estado_texto'] = "Activo";
        } elseif($usuario['estado'] == 2){
            $usuario['estado_texto'] = "Bloqueado";
        } else {
            $usuario['estado_texto'] = "Inactivo";
        }

        // Grado completo
        if($usuario['nombre_grado']){
            $usuario['grado_completo'] = $usuario['nombre_grado'] . " - " . $usuario['seccion'];
        } else {
            $usuario['grado_completo'] = "No asignado";
        }

    }

    return $usuario;
}



public function inactivarUsuario($id){

    $sql = "UPDATE usuarios SET estado = 3 WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute([$id]);

}

public function actualizarEstadoUsuario($id, $estado){

    $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);

    return $stmt->execute([$estado, $id]);
}


}
