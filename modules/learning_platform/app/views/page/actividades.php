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
    <title>Actividades | Error404</title>

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
                                <h2>Actividades</h2>
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
                                            Actividades
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
                <?php if (in_array($rol, ['admin', 'estudiante'])): ?>
                    <div class="row justify-content-center align-items-center" style="min-height:55vh; margin-bottom:30px;">
                        <div class="col-lg-9">
                            <div class="position-relative p-5 text-center shadow-lg"
                                style="
                border-radius:30px;
                background: linear-gradient(135deg, #01389D, #0086DE, #01389D);
                color:white;
                overflow:hidden;
             ">

                                <!-- Formas decorativas suaves -->
                                <div style="
                position:absolute;
                width:180px;
                height:180px;
                background:rgba(255,255,255,0.08);
                border-radius:50%;
                top:-50px;
                right:-50px;
                transform: rotate(45deg);
            "></div>

                                <div style="
                position:absolute;
                width:120px;
                height:120px;
                background:rgba(255,255,255,0.06);
                border-radius:50%;
                bottom:-40px;
                left:-40px;
                transform: rotate(-30deg);
            "></div>

                                <div class="position-relative">

                                    <!-- Código 503 -->
                                    <h1 style="
                    font-size:85px;
                    font-weight:900;
                    letter-spacing:4px;
                    margin-bottom:10px;
                ">
                                        503
                                    </h1>

                                    <!-- Subtítulo -->
                                    <h4 class="mb-3 fw-bold" style="opacity:0.95;">
                                        Servicio temporalmente no disponible
                                    </h4>

                                    <!-- Icono -->
                                    <div class="mb-4">
                                        <i class="mdi mdi-school-outline" style="font-size:70px; opacity:0.9;"></i>
                                    </div>

                                    <!-- Mensaje -->
                                    <p style="
                    font-size:17px;
                    max-width:650px;
                    margin:auto;
                    opacity:0.9;
                ">
                                        Esta sección del sistema educativo aún está en desarrollo.
                                        Será habilitada en próximas actualizaciones para mejorar tu experiencia académica.
                                    </p>

                                    <!-- Badge -->
                                    <div class="mt-4">
                                        <span class="badge px-4 py-2"
                                            style="
                            border-radius:50px;
                            background:rgba(255,255,255,0.15);
                            font-size:14px;
                          ">
                                            Próximamente disponible
                                        </span>
                                    </div>

                                    <!-- Botón -->
                                    <div class="mt-4">
                                        <a href="dashboard.php"
                                            class="btn btn-light px-4 py-2 shadow"
                                            style="
                            border-radius:50px;
                            font-weight:600;
                            color:#1e3c72;
                       ">
                                            <i class="mdi mdi-arrow-left"></i> Volver al panel principal
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- ========== Bloque_contenido_end ========== -->
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
</body>

</html>