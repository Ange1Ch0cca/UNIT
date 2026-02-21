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

    public function getUsuarioPorId($id)
    {

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

                -- DATOS ESTUDIANTE
                e.fecha_ingreso AS fecha_ingreso_estudiante,
                g.nombre_grado,
                g.seccion,

                -- DATOS DOCENTE
                d.profesion,
                d.fecha_ingreso AS fecha_ingreso_docente

            FROM usuarios u
            LEFT JOIN roles r ON u.rol_id = r.id

            LEFT JOIN estudiantes e ON u.id = e.usuario_id
            LEFT JOIN grados g ON e.grado_id = g.id

            LEFT JOIN docentes d ON u.id = d.usuario_id

            WHERE u.id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {

            // Estado bonito
            if ($usuario['estado'] == 1) {
                $usuario['estado_texto'] = "Activo";
            } elseif ($usuario['estado'] == 2) {
                $usuario['estado_texto'] = "Bloqueado";
            } else {
                $usuario['estado_texto'] = "Inactivo";
            }

            // Si es estudiante
            if ($usuario['rol'] == 'estudiante') {
                $usuario['fecha_ingreso'] = $usuario['fecha_ingreso_estudiante'];
                $usuario['grado_completo'] =
                    $usuario['nombre_grado']
                    ? $usuario['nombre_grado'] . " - " . $usuario['seccion']
                    : "No asignado";
            }

            // Si es docente
            if ($usuario['rol'] == 'docente') {
                $usuario['fecha_ingreso'] = $usuario['fecha_ingreso_docente'];
            }
        }

        return $usuario;
    }




    public function inactivarUsuario($id)
    {

        $sql = "UPDATE usuarios SET estado = 3 WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function actualizarEstadoUsuario($id, $estado)
    {

        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$estado, $id]);
    }

    public function getDocentes()
    {

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
                d.id AS docente_id,
                d.profesion
            FROM usuarios u
            INNER JOIN docentes d ON d.usuario_id = u.id
            WHERE u.rol_id = 2
            ORDER BY u.id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $docentes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($docentes as &$d) {
            $d['estado_texto'] = ($d['estado'] == 1) ? "Activo" : "Inactivo";
        }

        return $docentes;
    }

    public function getCursosPorDocente($docente_id)
    {

        $sql = "SELECT 
                c.nombre AS curso,
                g.nombre_grado,
                g.seccion
            FROM curso_grado_docente cgd
            INNER JOIN cursos c ON c.id = cgd.curso_id
            INNER JOIN grados g ON g.id = cgd.grado_id
            WHERE cgd.docente_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$docente_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCursosAsignados()
    {
        $sql = "SELECT 
                cgd.id,
                c.nombre AS curso,
                g.nombre_grado,
                g.seccion,
                u.nombres,
                u.apellidos
            FROM curso_grado_docente cgd
            INNER JOIN cursos c ON cgd.curso_id = c.id
            INNER JOIN grados g ON cgd.grado_id = g.id
            INNER JOIN docentes d ON cgd.docente_id = d.id
            INNER JOIN usuarios u ON d.usuario_id = u.id
            WHERE cgd.estado = 1
            ORDER BY g.nombre_grado ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarAsignacion($id)
    {
        $sql = "UPDATE curso_grado_docente SET estado = 0 WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getCursos()
    {

        $sql = "SELECT id, nombre, descripcion, foto_portada, estado
            FROM cursos
            ORDER BY nombre ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cambiarEstadoCurso($id, $estado)
    {

        $sql = "UPDATE cursos SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$estado, $id]);
    }

    public function getGrados()
    {

        $sql = "SELECT id, nombre_grado, seccion, estado FROM grados";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function cambiarEstadoGrado($id, $estado)
    {

        $sql = "UPDATE grados SET estado = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$estado, $id]);
    }

    public function getUsuariosSinAdmin()
    {

        $sql = "SELECT id, usuario, nombres, apellidos, foto, password 
            FROM usuarios 
            WHERE rol_id != 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function resetearPassword($id)
    {

        $nuevaPassword = password_hash("Error404", PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([$nuevaPassword, $id]);
    }

    public function getEstudiantesConGrado()
    {

        $sql = "SELECT 
                e.id,
                u.nombres,
                u.apellidos,
                g.nombre_grado,
                g.seccion,
                e.fecha_ingreso
            FROM estudiantes e
            INNER JOIN usuarios u ON e.usuario_id = u.id
            INNER JOIN grados g ON e.grado_id = g.id
            WHERE e.estado = 1
            ORDER BY u.apellidos ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGradosPorAnio($anio)
    {
        $sql = "SELECT id, nombre_grado, seccion 
            FROM grados
            WHERE estado = 1 AND anio = ?
            ORDER BY nombre_grado ASC, seccion ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$anio]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCursosPorGrado($grado_id)
    {
        $sql = "SELECT 
                cgd.id,
                c.nombre AS curso,
                u.nombres,
                u.apellidos
            FROM curso_grado_docente cgd
            INNER JOIN cursos c ON cgd.curso_id = c.id
            INNER JOIN docentes d ON cgd.docente_id = d.id
            INNER JOIN usuarios u ON d.usuario_id = u.id
            WHERE cgd.grado_id = ?
            AND cgd.estado = 1
            AND c.estado = 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$grado_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEstudiantesConPromedio($curso_grado_docente_id, $grado_id)
    {
        $sql = "SELECT 
                e.id AS estudiante_id,
                u.nombres,
                u.apellidos,
                ROUND(AVG(cal.valor_numerico),2) AS promedio
            FROM estudiantes e
            INNER JOIN usuarios u ON e.usuario_id = u.id
            LEFT JOIN calificaciones cal 
                ON cal.estudiante_id = e.id
                AND cal.curso_grado_docente_id = ?
            WHERE e.grado_id = ?
            GROUP BY e.id
            ORDER BY u.apellidos ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$curso_grado_docente_id, $grado_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNotasEstudiante($estudiante_id, $curso_grado_docente_id)
    {
        $sql = "SELECT 
                cal.fecha,
                tc.nombre AS tipo,
                cal.valor_numerico,
                cal.observacion
            FROM calificaciones cal
            INNER JOIN tipos_calificacion tc 
                ON cal.tipo_calificacion_id = tc.id
            WHERE cal.estudiante_id = ?
            AND cal.curso_grado_docente_id = ?
            ORDER BY cal.fecha DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$estudiante_id, $curso_grado_docente_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCursosAsignadosPorDocente($docente_id, $anio)
    {
        $sql = "SELECT cgd.id AS curso_grado_docente_id,
                   c.nombre AS curso,
                   g.nombre_grado,
                   g.seccion
            FROM curso_grado_docente cgd
            INNER JOIN cursos c ON cgd.curso_id = c.id
            INNER JOIN grados g ON cgd.grado_id = g.id
            WHERE cgd.docente_id = ? 
            AND cgd.estado = 1
            AND YEAR(cgd.fecha_creacion) = ?
            ORDER BY g.nombre_grado ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$docente_id, $anio]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGradosPorCurso($curso_grado_docente_id)
    {
        $sql = "SELECT g.id AS grado_id, g.nombre_grado, g.seccion
            FROM curso_grado_docente cgd
            INNER JOIN grados g ON cgd.grado_id = g.id
            WHERE cgd.id = ? AND cgd.estado = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$curso_grado_docente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardarNota($estudiante_id, $curso_grado_docente_id, $rubro, $valor)
    {
        if ($rubro === "observacion") {
            // Guardar observación sin tipo_calificacion
            $sql = "UPDATE calificaciones 
                SET observacion = ? 
                WHERE estudiante_id = ? 
                AND curso_grado_docente_id = ? 
                AND DATE(fecha) = CURDATE()";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$valor, $estudiante_id, $curso_grado_docente_id]);
            return;
        }

        // Buscar si ya existe nota del rubro hoy
        $sql = "SELECT cal.id
            FROM calificaciones cal
            INNER JOIN tipos_calificacion tc ON cal.tipo_calificacion_id = tc.id
            WHERE cal.estudiante_id = ? 
              AND cal.curso_grado_docente_id = ? 
              AND tc.nombre = ? 
              AND DATE(cal.fecha) = CURDATE()
            LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$estudiante_id, $curso_grado_docente_id, $rubro]);
        $existe = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existe) {
            $sqlUpdate = "UPDATE calificaciones SET valor_numerico = ? WHERE id = ?";
            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->execute([$valor, $existe['id']]);
        } else {

    $sqlInsert = "INSERT INTO calificaciones 
        (estudiante_id, curso_grado_docente_id, tipo_calificacion_id, valor_numerico, fecha)
        VALUES (
            ?, 
            ?, 
            (SELECT id FROM tipos_calificacion 
             WHERE nombre = ? 
             AND curso_grado_docente_id = ?
             LIMIT 1),
            ?, 
            NOW()
        )";

    $stmtInsert = $this->conn->prepare($sqlInsert);

    $stmtInsert->execute([
        $estudiante_id,
        $curso_grado_docente_id,
        $rubro,
        $curso_grado_docente_id,
        $valor
    ]);
}
    }
}
