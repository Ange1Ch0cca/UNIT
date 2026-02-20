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
                                <h2>Calificaciones</h2>
                                <p>para mañana: la dinamica de esta hoja es que el admin pueda seleccionar el año en la parte superior con un dropdown y ahi se le mostrara todos los grados de ese año porque si no se hara muy larago hacia abajo, obviamente debe cargar por defecto del año en el que nos escontramos actualemnte, y cuando ingrese dando click en el card del grado se le mostrara los card de curso(estos son los que tienen imagen), que esten asignados a ese grado, y cuando ingrese al curso dando click se le mostrara la lista de todos del salon co su nota promedio final total, y debe tener u boton y cuando se presione ese boton se abrira otra tabla pero solo de ese estudiante con todas sus notas por fecha de forma descendente de ultima a primera nota por defecto pero se podra invertir porque debe ser una datatable, y se debe poder imprimir(sera el reporte de notas solo del estudiante). </p>
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
                                            Calificaciones
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
                    <!------CARDS PARA GRADOS CON DIVISOR DE AÑO------>
                    <div class="row" style="row-gap:20px; margin-bottom:30px;">

                        <!-- DIVISOR AÑO 2025 -->
                        <div class="col-12" style="margin-bottom:12px;">
                            <div style="width:100%; padding:6px 12px; background:#f1f3f5; border-radius:8px;">
                                <h6 style="margin:0; font-weight:600; color:#495057; font-size:14px;">AÑO 2025</h6>
                            </div>
                        </div>

                        <!-- GRADOS DEL 2025 -->
                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);
            position:relative;">

                                <!-- Indicador estado -->
                                <span style="position:absolute;
                top:14px;
                right:14px;
                width:10px;
                height:10px;
                border-radius:50%;
                background:#4CAF50;">
                                </span>

                                <h5 style="font-size:16px;
                font-weight:600;
                margin-bottom:6px;
                letter-spacing:1px;">
                                    PRIMERO
                                </h5>

                                <span style="font-size:13px; color:#6c757d;">
                                    Sección: A
                                </span>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);
            position:relative;">

                                <span style="position:absolute;
                top:14px;
                right:14px;
                width:10px;
                height:10px;
                border-radius:50%;
                background:#4CAF50;">
                                </span>

                                <h5 style="font-size:16px;
                font-weight:600;
                margin-bottom:6px;
                letter-spacing:1px;">
                                    SEGUNDO
                                </h5>

                                <span style="font-size:13px; color:#6c757d;">
                                    Sección: B
                                </span>

                            </div>
                        </div>

                        <!-- DIVISOR AÑO 2024 -->
                        <div class="col-12" style="margin-bottom:12px; margin-top:18px;">
                            <div style="width:100%; padding:6px 12px; background:#f1f3f5; border-radius:8px;">
                                <h6 style="margin:0; font-weight:600; color:#495057; font-size:14px;">AÑO 2024</h6>
                            </div>
                        </div>

                        <!-- GRADOS DEL 2024 -->
                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);
            position:relative;">

                                <span style="position:absolute;
                top:14px;
                right:14px;
                width:10px;
                height:10px;
                border-radius:50%;
                background:#F44336;">
                                </span>

                                <h5 style="font-size:16px;
                font-weight:600;
                margin-bottom:6px;
                letter-spacing:1px;">
                                    TERCERO
                                </h5>

                                <span style="font-size:13px; color:#6c757d;">
                                    Sección: C
                                </span>

                            </div>
                        </div>

                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:12px;
            padding:20px;
            box-shadow:0 4px 12px rgba(0,0,0,0.06);
            position:relative;">

                                <span style="position:absolute;
                top:14px;
                right:14px;
                width:10px;
                height:10px;
                border-radius:50%;
                background:#F44336;">
                                </span>

                                <h5 style="font-size:16px;
                font-weight:600;
                margin-bottom:6px;
                letter-spacing:1px;">
                                    CUARTO
                                </h5>

                                <span style="font-size:13px; color:#6c757d;">
                                    Sección: A
                                </span>

                            </div>
                        </div>

                    </div>

                    <!------CARDS PARA CURSOS ASIGNADOS AL GRADO SELECCIONADO------>

                    <div class="row" style="row-gap:20px; margin-bottom:30px;">

                        <!-- CURSO -->
                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:14px;
            overflow:hidden;
            box-shadow:0 4px 10px rgba(0,0,0,0.05);
            transition:0.25s ease;">

                                <!-- Imagen -->
                                <div style="width:100%; height:140px; overflow:hidden;">
                                    <img src="https://via.placeholder.com/400x300"
                                        style="width:100%; height:100%; object-fit:cover; display:block;">
                                </div>

                                <!-- Información -->
                                <div style="padding:14px 16px 18px 16px;">

                                    <h6 style="font-size:15px;
                    font-weight:600;
                    margin-bottom:5px;
                    letter-spacing:0.3px;">
                                        MATEMÁTICA
                                    </h6>

                                    <span style="font-size:13px; color:#6c757d;">
                                        Prof. Juan Pérez
                                    </span>

                                </div>

                            </div>
                        </div>

                        <!-- CURSO -->
                        <div class="col-lg-3 col-6 d-flex">
                            <div style="width:100%;
            background:#fff;
            border-radius:14px;
            overflow:hidden;
            box-shadow:0 4px 10px rgba(0,0,0,0.05);">

                                <div style="width:100%; height:140px; overflow:hidden;">
                                    <img src="https://via.placeholder.com/400x300"
                                        style="width:100%; height:100%; object-fit:cover; display:block;">
                                </div>

                                <div style="padding:14px 16px 18px 16px;">

                                    <h6 style="font-size:15px;
                    font-weight:600;
                    margin-bottom:5px;
                    letter-spacing:0.3px;">
                                        COMUNICACIÓN
                                    </h6>

                                    <span style="font-size:13px; color:#6c757d;">
                                        Prof. María López
                                    </span>

                                </div>

                            </div>
                        </div>

                        <!-- Duplica más cards aquí -->

                    </div>

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