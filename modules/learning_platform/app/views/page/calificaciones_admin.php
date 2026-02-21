<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";
require_once "../../controllers/DashboardController.php";

// Crear instancia de la clase Database
$database = new Database();
$conn = $database->conectar();

// Crear controlador con la conexión
$controller = new DashboardController($conn);

$rol = $_SESSION['rol'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>R. Calificaciones | Error404</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="../../../assets/css/main.css" />
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        @media print {

            body * {
                visibility: hidden;
            }

            #area-impresion,
            #area-impresion * {
                visibility: visible;
            }

            #area-impresion {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 20px;
            }

            .no-print {
                display: none !important;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            thead {
                display: table-header-group;
            }
        }
    </style>

</head>

<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <?php require_once('../layout/sidebar.php'); ?>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <?php require_once('../layout/navbar.php'); ?>

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>Reporte Calificaciones</h2>
                                <p>Falta modificar para que el admin pueda cambiar las notas de todos a su antojo(aun que no deba)</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard.php">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            R. Calificaciones
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <!-- ========== Bloque_contenido_start ========== -->

                <!-- ===============SOLO ADMIN ================== -->
                <?php if ($rol === 'admin'): ?>
                    <div class="col-12" style="margin-bottom:20px;">
                        <div style="max-width:220px;">
                            <label style="font-size:13px; font-weight:600;">
                                Seleccionar Año
                            </label>
                            <select id="selectAnio" class="form-select"></select>
                        </div>
                    </div>

                    <div id="contenedor-grados" class="row"></div>
                    <div id="contenedor-cursos" class="row" style="display:none;"></div>
                    <div id="contenedor-estudiantes" style="display:none;"></div>
                    <div id="contenedor-notas" style="display:none;"></div>

                    <!-- ========== Bloque_contenido_end ========== -->
                <?php endif; ?>
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <?php require_once('../layout/footer.php'); ?>
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script>
        let gradoSeleccionado = null;
        let cursoSeleccionado = null;

        $(document).ready(function() {

            let anioActual = new Date().getFullYear();

            for (let i = anioActual; i >= anioActual - 5; i--) {
                $("#selectAnio").append(`<option value="${i}">${i}</option>`);
            }

            $("#selectAnio").val(anioActual);
            cargarGrados(anioActual);

            $("#selectAnio").change(function() {
                let anio = $(this).val();
                cargarGrados(anio);
            });

        });
        $(document).on("mouseenter", ".card-hover", function() {
            $(this).css("transform", "translateY(-4px)");
        });

        function cargarGrados(anio) {

            $("#contenedor-cursos").hide().empty();
            $("#contenedor-estudiantes").hide().empty();
            $("#contenedor-notas").hide().empty();

            $.get("../../services/get_grados.php", {
                anio: anio
            }, function(data) {

                let grados = JSON.parse(data);
                let html = "";

                grados.forEach(g => {

                    html += `
            <div class="col-lg-3 col-6 d-flex">
                <div style="width:100%;
                    background:#fff;
                    border-radius:12px;
                    padding:20px;
                    box-shadow:0 4px 12px rgba(0,0,0,0.06);
                    position:relative;
                    cursor:pointer;
                    transition:0.25s ease;"
                    onclick="cargarCursos(${g.id})"
                    onmouseover="this.style.transform='translateY(-4px)'"
                    onmouseout="this.style.transform='translateY(0)'">

                    <span style="position:absolute;
                        top:14px;
                        right:14px;
                        width:10px;
                        height:10px;
                        border-radius:50%;
                        background:${g.estado == 1 ? '#dc3545' : '#4CAF50'};">
                    </span>

                    <h5 style="font-size:16px;
                        font-weight:600;
                        margin-bottom:6px;
                        letter-spacing:1px;">
                        ${g.nombre_grado}
                    </h5>

                    <span style="font-size:13px; color:#6c757d;">
                        Sección: ${g.seccion}
                    </span>

                </div>
            </div>`;
                });

                $("#contenedor-grados").html(html).show();
            });
        }

        function cargarCursos(grado_id) {

            gradoSeleccionado = grado_id;

            $("#contenedor-grados").hide();
            $("#contenedor-estudiantes").hide().empty();
            $("#contenedor-notas").hide().empty();

            $.get("../../services/get_cursos.php", {
                grado_id: grado_id
            }, function(data) {

                let cursos = JSON.parse(data);
                let html = "";

                cursos.forEach(c => {

                    html += `
            <div class="col-lg-3 col-6 d-flex">
                <div style="width:100%;
                    background:#fff;
                    border-radius:14px;
                    overflow:hidden;
                    box-shadow:0 4px 10px rgba(0,0,0,0.05);
                    transition:0.25s ease;
                    cursor:pointer;"
                    onclick="cargarEstudiantes(${c.id})"
                    onmouseover="this.style.transform='translateY(-4px)'"
                    onmouseout="this.style.transform='translateY(0)'">

                    <div style="width:100%; height:140px; overflow:hidden;">
                        <img src="https://via.placeholder.com/400x300"
                            style="width:100%; height:100%; object-fit:cover; display:block;">
                    </div>

                    <div style="padding:14px 16px 18px 16px;">

                        <h6 style="font-size:15px;
                            font-weight:600;
                            margin-bottom:5px;
                            letter-spacing:0.3px;">
                            ${c.curso}
                        </h6>

                        <span style="font-size:13px; color:#6c757d;">
                            Prof. ${c.nombres} ${c.apellidos}
                        </span>

                    </div>

                </div>
            </div>`;
                });

                $("#contenedor-cursos").html(html).show();
            });
        }

        function cargarEstudiantes(cgd_id) {

            cursoSeleccionado = cgd_id;

            $("#contenedor-cursos").hide();
            $("#contenedor-notas").hide().empty();

            $.get("../../services/get_estudiantes.php", {
                    cgd_id: cgd_id,
                    grado_id: gradoSeleccionado
                },
                function(data) {

                    let estudiantes = JSON.parse(data);

                    let html = `
<div style="background:#fff;
            padding:25px;
            border-radius:14px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);">

<table id="tablaEstudiantes" class="table table-bordered">
        <thead>
        <tr>
            <th>Alumno</th>
            <th>Promedio</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>`;

                    estudiantes.forEach(e => {
                        html += `
            <tr>
                <td>${e.nombres} ${e.apellidos}</td>
                <td>${e.promedio ?? 0}</td>
                <td>
                    <button class="btn btn-sm btn-primary"
                        onclick="cargarNotas(${e.estudiante_id})">
                        Ver Notas
                    </button>
                </td>
            </tr>`;
                    });

                    html += "</tbody></table></div>";

                    $("#contenedor-estudiantes").html(html).show();

                    $('#tablaEstudiantes').DataTable({
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                        }
                    });
                });
        }

        function cargarNotas(estudiante_id) {

            $("#contenedor-estudiantes").hide();

            $.get("../../services/get_notas.php", {
                    estudiante_id: estudiante_id,
                    cgd_id: cursoSeleccionado
                },
                function(data) {

                    let notas = JSON.parse(data); // 👈 ESTA LINEA FALTABA
                    if (notas.length === 0) {
                        $("#contenedor-notas").html(`
        <div class="alert alert-warning">
            No existen notas registradas para este estudiante.
        </div>
    `).show();
                        return;
                    }

                    let fechaActual = new Date().toLocaleString();
                    let usuario = "<?= $_SESSION['nombres'] ?? '' ?>";

                    let html = `
<div id="area-impresion">

<div style="display:flex; justify-content:space-between; margin-bottom:20px; font-size:13px;">
    <div>${fechaActual}</div>
    <div style="text-align:center;">
        <img src="../../../assets/images/logo.png" style="height:50px;"><br>
        <strong>Sistema Escolar Error404</strong>
    </div>
    <div>${usuario}</div>
</div>

<div style="margin-bottom:20px;">
    <h5 style="margin-bottom:5px;">Reporte de Calificaciones</h5>
    <p style="margin:0;"><strong>Estudiante:</strong> ${notas[0]?.estudiante ?? ''}</p>
    <p style="margin:0;"><strong>Curso:</strong> ${notas[0]?.curso ?? ''}</p>
    <p style="margin:0;"><strong>Profesor:</strong> ${notas[0]?.profesor ?? ''}</p>
    <p style="margin:0;"><strong>Año:</strong> ${$("#selectAnio").val()}</p>
</div>

<div style="background:#fff;
            padding:25px;
            border-radius:14px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);">

<button class="btn btn-success mb-3 no-print"
    onclick="window.print()">Imprimir</button>

<table id="tablaNotas" class="table table-bordered">
<thead>
<tr>
    <th>Fecha</th>
    <th>Tipo</th>
    <th>Nota</th>
    <th>Observación</th>
</tr>
</thead>
<tbody>`;

                    notas.forEach(n => {
                        html += `
            <tr>
                <td>${n.fecha}</td>
                <td>${n.tipo}</td>
                <td>${n.valor_numerico}</td>
                <td>${n.observacion ?? ''}</td>
            </tr>`;
                    });

                    html += "</tbody></table></div>";

                    $("#contenedor-notas").html(html).show();

                    $('#tablaNotas').DataTable({
                        order: [
                            [0, 'desc']
                        ],
                        language: {
                            url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                        }
                    });
                });
        }
    </script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/Chart.min.js"></script>
    <script src="../../../assets/js/dynamic-pie-chart.js"></script>
    <script src="../../../assets/js/moment.min.js"></script>
    <script src="../../../assets/js/fullcalendar.js"></script>
    <script src="../../../assets/js/jvectormap.min.js"></script>
    <script src="../../../assets/js/world-merc.js"></script>
    <script src="../../../assets/js/polyfill.js"></script>
    <script src="../../../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>