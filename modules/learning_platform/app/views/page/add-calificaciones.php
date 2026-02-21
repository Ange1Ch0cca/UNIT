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
    <title>Add Calificaciones | Error404</title>

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
        .curso-card:hover,
        .grado-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

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
                                <h2>Añadir Calificaciones</h2>
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
                                            Add Calificaciones
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
                <?php if ($rol === 'admin' || $rol === 'docente'): ?>
                    <div id="contenedor-cursos" class="row"></div>
                    <div id="contenedor-grados" class="row" style="display:none;"></div>
                    <div id="contenedor-estudiantes" style="display:none;"></div>
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
            cargarCursosDocente();
        });

        function cargarCursosDocente() {
            $("#contenedor-cursos").empty();
            $.get("../../services/get_cursos_docente.php", {
                anio: new Date().getFullYear()
            }, function(response) {

                if (!response.success) {
                    console.error("Error al cargar cursos:", response.error);
                    $("#contenedor-cursos").html('<div class="alert alert-danger">No se pudieron cargar los cursos.</div>');
                    return;
                }

                let cursos = response.data;
                let html = "";

                cursos.forEach(c => {
                    html += `
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card shadow-sm border-0 curso-card h-100"
         onclick="cargarGrados(${c.curso_grado_docente_id})"
         style="cursor:pointer; transition:0.3s;">
        <div class="card-body text-center">
            <i class="mdi mdi-book-open-page-variant mdi-36px text-primary mb-2"></i>
            <h5 class="fw-bold">${c.curso}</h5>
            <p class="text-muted mb-0">Grado: ${c.nombre_grado}</p>
        </div>
    </div>
</div>`;
                });

                $("#contenedor-cursos").html(html).show();
            });
        }

        $(document).on("mouseenter", ".card-hover", function() {
            $(this).css("transform", "translateY(-4px)");
        }).on("mouseleave", ".card-hover", function() {
            $(this).css("transform", "translateY(0)");
        });

        function cargarGrados(curso_grado_docente_id) {
            cursoSeleccionado = curso_grado_docente_id;

            $("#contenedor-cursos").hide();
            $("#contenedor-grados").empty();
            $("#contenedor-estudiantes").hide().empty();

            $.get("../../services/get_grados_curso.php", {
                curso_grado_docente_id
            }, function(response) {

                if (!response.success) {
                    console.error("Error al cargar grados:", response.error);
                    $("#contenedor-grados").html('<div class="alert alert-danger">No se pudieron cargar los grados.</div>');
                    return;
                }

                let grados = response.data;
                let html = `
<div class="col-12 mb-3">
    <button class="btn btn-outline-secondary"
        onclick="volverCursos()">
        ← Volver a Cursos
    </button>
</div>
`;

                grados.forEach(g => {
                    html += `
<div class="col-lg-4 col-md-6 mb-4">
    <div class="card shadow-sm border-0 grado-card h-100"
         onclick="cargarEstudiantes(${g.grado_id}, ${curso_grado_docente_id})"
         style="cursor:pointer;">
        <div class="card-body text-center">
            <i class="mdi mdi-school mdi-36px text-success mb-2"></i>
            <h5 class="fw-bold">${g.nombre_grado}</h5>
            <p class="text-muted mb-0">Sección: ${g.seccion}</p>
        </div>
    </div>
</div>`;
                });

                $("#contenedor-grados").html(html).show();

                
            });
        }

        function cargarEstudiantes(grado_id, curso_grado_docente_id) {

            gradoSeleccionado = grado_id;
            cursoSeleccionado = curso_grado_docente_id;

            $("#contenedor-grados").hide();
            $("#contenedor-estudiantes").empty().show();

            $.when(
                $.get("../../services/get_estudiantes_grado.php", {
                    grado_id
                }),
                $.get("../../services/get_tipos_calificacion.php", {
                    curso_grado_docente_id: cursoSeleccionado
                })
            ).done(function(estRes, tiposRes) {

                    let estudiantes = estRes[0].data;
                    let tipos = tiposRes[0].data;
                    if (tipos.length === 0) {
    $("#contenedor-estudiantes").html(`
        <div class="alert alert-warning text-center">
            No hay rubros configurados para este curso.
            <br><br>
            <button class="btn btn-primary"
                onclick="mostrarModalRubro()">
                + Crear Primer Rubro
            </button>
        </div>
    `);
    return;
}

                if (!estudiantes || !tipos) {
                    console.error("Error en datos:", estRes, tiposRes);
                    return;
                }

                let html = `
<div id="tablaIngreso">

<div class="mb-3 d-flex justify-content-between">
    <div>
        <button class="btn btn-secondary"
            onclick="volverGrados()">
            ← Volver
        </button>
    </div>
    <div>
        <button class="btn btn-warning me-2"
            onclick="verHistorial()">
            Ver Historial
        </button>
        <button class="btn btn-primary me-2"
            onclick="mostrarModalRubro()">
            + Agregar Rubro
        </button>
        <button class="btn btn-success"
            onclick="guardarNotas()">
            Guardar Clase
        </button>
    </div>
</div>

<table id="tablaEstudiantes" class="table table-bordered text-center align-middle">
<thead class="table-dark">
<tr>
<th style="min-width:200px;">Alumno</th>`;

                tipos.forEach(t => {
                    html += `
<th>
${t.nombre}
<button class="btn btn-sm btn-danger ms-1"
    onclick="eliminarRubro(${t.id})">
    ×
</button>
</th>`;
                });

                html += `<th>Observación</th></tr></thead><tbody>`;

                estudiantes.forEach(e => {

                    html += `<tr data-estudiante-id="${e.estudiante_id}">
                        <td>${e.apellidos}, ${e.nombres}</td>`;

                    tipos.forEach(t => {
                        html += `<td contenteditable="true"
                            class="nota"
                            data-tipo-id="${t.id}"></td>`;
                    });

                    html += `<td contenteditable="true" class="observacion"></td>
                     </tr>`;
                });

                html += `</tbody></table>

<div class="mt-3 text-end">
    <button id="btnVerResumen" class="btn btn-primary me-2">
        Ver Resumen
    </button>
    <button id="btnGuardarNotas" class="btn btn-success">
        Guardar Clase
    </button>
</div>

</div>

<div id="tablaResumen" style="display:none;"></div>
`;

                $("#contenedor-estudiantes").html(html);

                $('#tablaEstudiantes').DataTable({
                    paging: true,
                    searching: true,
                    info: false,
                    language: {
                        search: "Buscar:",
                        paginate: {
                            next: "Siguiente",
                            previous: "Anterior"
                        }
                    }
                });

                $("#btnGuardarNotas").click(function() {
                    guardarNotas();
                }); $("#btnVerResumen").click(function() {

                    $("#tablaIngreso").hide();
                    $("#tablaResumen").show();

                    generarTablaResumen();
                });

            });
        }

        function guardarNotas() {

            let datos = [];

            $("#tablaEstudiantes tbody tr").each(function() {

                let estudiante_id = $(this).data("estudiante-id");

                $(this).find("td.nota").each(function() {

                    let tipo_calificacion_id = $(this).data("tipo-id");
                    let valor = $(this).text().trim();

                    if (valor !== "") {
                        datos.push({
                            estudiante_id,
                            curso_grado_docente_id: cursoSeleccionado,
                            tipo_calificacion_id,
                            valor
                        });
                    }
                });

                let observacion = $(this).find("td.observacion").text().trim();

                if (observacion !== "") {
                    datos.push({
                        estudiante_id,
                        curso_grado_docente_id: cursoSeleccionado,
                        observacion
                    });
                }
            });

            $.post("../../services/save_nota.php", {
                    notas: JSON.stringify(datos)
                },
                function() {
                    Swal.fire("Éxito", "Clase guardada correctamente", "success");
                }
            );
        }

        function verHistorial() {

            $.get("../../services/get_historial_calificaciones.php", {
                    curso_grado_docente_id: cursoSeleccionado
                },
                function(response) {

                    let datos = response.data;

                    let html = `
        <button class="btn btn-secondary mb-3"
            onclick="volverIngreso()">← Volver</button>

        <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>Fecha</th>
            <th>Alumno</th>
            <th>Rubro</th>
            <th>Nota</th>
            <th>Observación</th>
        </tr>
        </thead>
        <tbody>
        `;

                    datos.forEach(d => {
                        html += `
            <tr>
                <td>${d.fecha}</td>
                <td>${d.apellidos}, ${d.nombres}</td>
                <td>${d.rubro}</td>
                <td>${d.valor_numerico ?? ''}</td>
                <td>${d.observacion ?? ''}</td>
            </tr>`;
                    });

                    html += "</tbody></table>";

                    $("#tablaIngreso").hide();
                    $("#tablaResumen").html(html).show();
                });
        }

        function volverIngreso() {
            $("#tablaResumen").hide();
            $("#tablaIngreso").show();
        }

        function volverCursos() {
                    $("#contenedor-grados").hide();
                    $("#contenedor-estudiantes").hide();
                    $("#contenedor-cursos").show();
                }

        function agregarRubro(btn) {
            let th = `<th contenteditable="true">Nuevo Rubro</th>`;
            $("#tablaEstudiantes thead tr").append(th);
            $("#tablaEstudiantes tbody tr").each(function() {
                $(this).append('<td contenteditable="true" class="nota" data-rubro="nuevo"></td>');
            });
        }

        

        function mostrarModalRubro() {

            Swal.fire({
                title: "Nuevo Rubro",
                input: "text",
                inputPlaceholder: "Nombre del rubro",
                showCancelButton: true
            }).then(result => {

                if (result.isConfirmed) {

                    $.post("../../services/save_rubro.php", {
                        curso_grado_docente_id: cursoSeleccionado,
                        nombre: result.value
                    }, function() {
                        Swal.fire("Creado", "", "success");
                        cargarEstudiantes(gradoSeleccionado, cursoSeleccionado);
                    });
                }
            });
        }

        function eliminarRubro(id) {

            Swal.fire({
                title: "Eliminar rubro?",
                showCancelButton: true
            }).then(r => {
                if (r.isConfirmed) {
                    $.post("../../services/delete_rubro.php", {
                        id: id
                    }, function() {
                        cargarEstudiantes(gradoSeleccionado, cursoSeleccionado);
                    });
                }
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