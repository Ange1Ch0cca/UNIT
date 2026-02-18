<?php
require_once "../../../config/session.php";
$userId = $_SESSION['id'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../assets/css/fullcalendar.css" />
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
                                <h2>Estudiantes</h2>
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
                                            Estudiantes
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
                    <div class="row" style="row-gap:15px; margin-bottom:30px;">

                        <!-- Alumnos -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #4CAF50;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Alumnos</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_estudiantes']; ?></h3>
                                </div>

                                <i class="lni lni-users"
                                    style="font-size:28px; color:#4CAF50; flex-shrink:0;"></i>
                            </div>
                        </div>

                        <!-- Actividades -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #2196F3;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Actividades</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_actividades']; ?></h3>
                                </div>

                                <i class="lni lni-write"
                                    style="font-size:28px; color:#2196F3; flex-shrink:0;"></i>
                            </div>
                        </div>

                        <!-- Materiales -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #FF9800;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Materiales</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_materiales']; ?></h3>
                                </div>

                                <i class="lni lni-folder"
                                    style="font-size:28px; color:#FF9800; flex-shrink:0;"></i>
                            </div>
                        </div>

                        <!-- Grados -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #9C27B0;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Grados</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_grados']; ?></h3>
                                </div>

                                <i class="lni lni-graduation"
                                    style="font-size:28px; color:#9C27B0; flex-shrink:0;"></i>
                            </div>
                        </div>

                        <!-- Cursos -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #F44336;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Cursos</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_cursos']; ?></h3>
                                </div>

                                <i class="lni lni-book"
                                    style="font-size:28px; color:#F44336; flex-shrink:0;"></i>
                            </div>
                        </div>

                        <!-- Docentes -->
                        <div class="col-lg-2 col-4 d-flex">
                            <div style="width:100%; background:#fff; border-radius:12px; padding:18px; 
                box-shadow:0 4px 12px rgba(0,0,0,0.06); 
                border-left:5px solid #00BCD4;
                display:flex; align-items:center; justify-content:space-between;">

                                <div style="min-width:0;">
                                    <h6 style="font-size:14px; color:#6c757d; margin-bottom:5px;">Docentes</h6>
                                    <h3 style="font-size:22px; font-weight:600; margin:0;"><?php echo $data['total_docentes']; ?></h3>
                                </div>

                                <i class="lni lni-blackboard"
                                    style="font-size:28px; color:#00BCD4; flex-shrink:0;"></i>
                            </div>
                        </div>

                    </div>


                    <!-- ===============================
     RESET PASSWORD (TABLA)
================================= -->
                    <div class="row" style="margin-top:25px; margin-bottom:30px;">
                        <div class="col-12">

                            <div style="background:#ffffff;
                border-radius:14px;
                padding:22px;
                box-shadow:0 6px 18px rgba(0,0,0,0.06);
                overflow:hidden;">

                                <!-- Título -->
                                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; flex-wrap:wrap;">
                                    <h6 style="margin:0; font-weight:600; font-size:16px; color:#2c3e50;">
                                        Solicitudes de Reset Password
                                    </h6>
                                </div>

                                <!-- Tabla -->
                                <div class="table-responsive">
                                    <table id="tablaReset"
                                        class="table align-middle"
                                        style="width:100%; border-collapse:separate; border-spacing:0 8px;">

                                        <thead>
                                            <tr style="background:#f8f9fa;">
                                                <th style="border:none; font-size:13px; color:#6c757d;">Usuario</th>
                                                <th style="border:none; font-size:13px; color:#6c757d;">Mensaje</th>
                                                <th style="border:none; font-size:13px; color:#6c757d;">Fecha</th>
                                                <th style="border:none; font-size:13px; color:#6c757d; width:90px; text-align:center;">
                                                    Estado
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($solicitudes as $s): ?>
                                                <tr style="background:#ffffff; box-shadow:0 2px 8px rgba(0,0,0,0.04);">
                                                    <td><?php echo htmlspecialchars($s['usuario']); ?></td>
                                                    <td><?php echo htmlspecialchars($s['mensaje']); ?></td>
                                                    <td><?php echo $s['fecha_solicitud']; ?></td>
                                                    <td style="text-align:center;">
                                                        <?php if ($s['estado'] == 0): ?>
                                                            <button onclick="marcarLeido(<?php echo $s['id']; ?>)"
                                                                style="width:34px;height:34px;border-radius:50%;border:1.5px solid #656769;background:#656769;color:#fff;">
                                                                <i class="lni lni-envelope"></i>
                                                            </button>
                                                        <?php else: ?>
                                                            <button
                                                                style="width:34px;height:34px;border-radius:50%;border:1.5px solid #15df07;background:#15df07;color:#fff;">
                                                                <i class="lni lni-checkmark-circle"></i>
                                                            </button>
                                                        <?php endif; ?>
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

</body>

</html>