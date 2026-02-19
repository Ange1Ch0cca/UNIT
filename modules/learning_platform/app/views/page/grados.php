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

$grados = $controller->getGrados();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>Grados | Error404</title>

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
                                <h2>Grados</h2>
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
                                            Grados
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
     GRADOS (TABLA)
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

                                        <a href="add_grado.php"
                                            class="btn btn-primary"
                                            style="border-radius:8px; padding:6px 18px; font-weight:500;">

                                            <i class="mdi mdi-school" style="font-size:20px; vertical-align:middle; margin-right:6px;"></i>
                                            AGREGAR
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
                                                <th>ID</th>
                                                <th>Nombre del Grado</th>
                                                <th>Sección</th>
                                                <th style="text-align:center;">Estado</th>
                                                <th style="text-align:center;">Acción</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php foreach ($grados as $grado): ?>
                                                <tr>

                                                    <!-- ID -->
                                                    <td><?= $grado['id'] ?></td>

                                                    <!-- NOMBRE GRADO -->
                                                    <td><?= htmlspecialchars($grado['nombre_grado']) ?></td>

                                                    <!-- SECCION -->
                                                    <td><?= htmlspecialchars($grado['seccion']) ?></td>

                                                    <!-- ESTADO -->
                                                    <td style="text-align:center;">
                                                        <?php if ($grado['estado'] == 1): ?>
                                                            <span class="badge bg-success"
                                                                style="cursor:pointer;"
                                                                onclick="cambiarEstadoGrado(<?= $grado['id'] ?>, 0)">
                                                                Activo
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger"
                                                                style="cursor:pointer;"
                                                                onclick="cambiarEstadoGrado(<?= $grado['id'] ?>, 1)">
                                                                Inactivo
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- ACCIONES -->
                                                    <td style="text-align:center;">
                                                        <button class="btn btn-sm btn-warning"
                                                            onclick="editarGrado(<?= $grado['id'] ?>)">
                                                            <i class="mdi mdi-pencil"></i>
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
                    searchPlaceholder: "Buscar curso...",
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

        function editarGrado(id) {
            window.location.href = "editar_grado.php?id=" + id;
        }

        function cambiarEstadoGrado(id, nuevoEstado) {

            let texto = nuevoEstado == 1 ? "activar" : "desactivar";

            Swal.fire({
                title: '¿Deseas ' + texto + ' este grado?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch("../../controllers/CambiarEstadoGradoController.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id=" + id + "&estado=" + nuevoEstado
                        })
                        .then(response => response.text())
                        .then(data => {
                            location.reload();
                        });

                }
            });
        }
    </script>
</body>

</html>