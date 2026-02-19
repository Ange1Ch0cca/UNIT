<?php
require_once "../../../config/session.php";
require_once "../../controllers/DashboardController.php";

$controller = new DashboardController();

$userId = $_SESSION['id'];
$rol = $_SESSION['rol'];

$data = $controller->getDashboardData($userId, $rol);
$cursos = $controller->getCursosAsignados();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>Asignación C.G.D. | Error404</title>

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
                                <h2>Asignación C.G.D.</h2>
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
                                            CGD
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

                <!-- ===============SOLO ADMIN - RESUMEN GENERAL (6 CARDS)================== -->
                <?php if ($rol === 'admin'): ?>

                    <!-- ===============================
     CURSOS (TABLA)
================================= -->
                    <div class="row" style="margin-bottom:30px;">
                        <div class="col-12">

                            <div style="background:#ffffff;
                border-radius:14px;
                padding:22px;
                box-shadow:0 6px 18px rgba(0,0,0,0.06);
                overflow:hidden;">

                                <!-- Título -->
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; flex-wrap:wrap;">
                                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">

                                        <a href="add_curso_grado_docente.php"
                                            class="btn btn-primary"
                                            style="border-radius:8px; padding:6px 18px; font-weight:500;">

                                            <i class="mdi mdi-account-plus" style="font-size:20px; vertical-align:middle; margin-right:6px;"></i>
                                            ASIGNAR
                                        </a>



                                        <div id="buscadorContainer" style="margin-left:15px;"></div>


                                    </div>

                                </div>

                                <!-- Tabla -->
                                <div class="table-responsive">
                                    <table id="tablaReset"
                                        class="table align-middle"
                                        style="width:100%;">


                                        <thead>
                                            <tr style="background:#f8f9fa;">
                                                <th>Curso</th>
                                                <th>Grado</th>
                                                <th>Docente</th>
                                                <th style="text-align:center;">Acción</th>
                                            </tr>
                                        </thead>




                                        <tbody>
                                            <?php foreach ($cursos as $curso): ?>
                                                <tr>
                                                    <td><?= $curso['curso'] ?></td>

                                                    <td>
                                                        <?= $curso['nombre_grado'] . " - " . $curso['seccion'] ?>
                                                    </td>

                                                    <td>
                                                        <?= $curso['nombres'] . " " . $curso['apellidos'] ?>
                                                    </td>

                                                    <td style="text-align:center;">
                                                        <!-- Botón Editar -->
                                                        <button class="btn btn-sm btn-warning"
                                                            onclick="editarAsignacion(<?= $curso['id'] ?>)">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>

                                                        <!-- Botón Eliminar -->
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="eliminarAsignacion(<?= $curso['id'] ?>)">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>




                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <!-- ========== Bloque_contenido_end ========== -->

            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <?php require_once('../layout/footer.php'); ?>
    </main>
    <!-- ======== main-wrapper end =========== -->

    <div id="modalUsuario" style="
display:none;
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.5);
justify-content:center;
align-items:center;
z-index:9999;">

        <div style="
    background:white;
    width:90%;
    max-width:700px;
    border-radius:12px;
    padding:25px;
    position:relative;
    display:flex;
    flex-wrap:wrap;
    gap:30px;">

            <span onclick="cerrarModal()"
                style="position:absolute;right:15px;top:10px;
              font-size:22px;cursor:pointer;">&times;</span>

            <div id="modalFoto" style="
        flex:1;
        display:flex;
        align-items:center;
        justify-content:center;"></div>

            <div id="modalDatos" style="flex:2;"></div>

        </div>
    </div>

    <!-- ========= All Javascript files linkup ======== -->
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


    <script>
        $(document).ready(function() {

            let tabla = $('#tablaReset').DataTable({
                pageLength: 10,
                lengthChange: false,
                ordering: true,
                searching: true,
                info: false,
                autoWidth: false,
                responsive: true,
                language: {
                    search: "",
                    searchPlaceholder: "Buscar asignación...",
                    paginate: {
                        next: "›",
                        previous: "‹"
                    },
                    zeroRecords: "No se encontraron resultados"
                },
                dom: "<'row mb-3'<'col-md-6'f><'col-md-6 text-md-end'>>" +
                    "<'row'<'col-12'tr>>" +
                    "<'row mt-3'<'col-12 text-end'p>>"
            });

            // mover buscador al contenedor
            $('#tablaReset_filter').appendTo('#buscadorContainer');

        });

        function editarAsignacion(id) {
            window.location.href = "editar_curso_grado_docente.php?id=" + id;
        }

        function eliminarAsignacion(id) {

            Swal.fire({
                title: '¿Eliminar asignación?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch("../../controllers/EliminarCursoGradoDocenteController.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id=" + id
                        })
                        .then(() => {
                            Swal.fire(
                                'Eliminado',
                                'La asignación fue eliminada correctamente.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        });

                }
            });
        }
    </script>
</body>

</html>