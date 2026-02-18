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
}
