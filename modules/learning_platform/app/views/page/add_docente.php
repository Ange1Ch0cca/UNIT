<!DOCTYPE html>
<html lang="en">

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
                                <h2>Registro de Docente</h2>
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
                                            Registro de Docente
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
                <!-- ========== form-elements-wrapper start ========== -->
                <div class="form-elements-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card-style mb-30">

                                <form action="guardar_docente.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <!-- Foto -->
                                        <div class="col-md-12 text-center mb-3">
                                            <label class="form-label">Foto del docente</label>
                                            <input type="file" name="foto" accept="image/*" class="form-control" required>
                                        </div>

                                        <!-- Nombres -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input type="text" name="nombres" placeholder="Nombres" required />
                                                <span class="icon"><i class="lni lni-user"></i></span>
                                            </div>
                                        </div>

                                        <!-- Apellidos -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input type="text" name="apellidos" placeholder="Apellidos" required />
                                                <span class="icon"><i class="lni lni-user"></i></span>
                                            </div>
                                        </div>

                                        <!-- Profesión -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input type="text" name="profesion" placeholder="Profesión" required />
                                                <span class="icon"><i class="lni lni-briefcase"></i></span>
                                            </div>
                                        </div>

                                        <!-- DNI -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input type="text" name="dni" placeholder="DNI" maxlength="8" pattern="[0-9]{8}" required />
                                                <span class="icon"><i class="lni lni-credit-cards"></i></span>
                                            </div>
                                        </div>

                                        <!-- Celular -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input
                                                    type="tel"
                                                    name="celular"
                                                    placeholder="Celular (9 dígitos)"
                                                    pattern="9[0-9]{8}"
                                                    maxlength="9"
                                                    required />
                                                <span class="icon"><i class="lni lni-phone"></i></span>
                                            </div>
                                        </div>

                                        <!-- Correo -->
                                        <div class="col-md-6">
                                            <div class="input-style-3">
                                                <input type="email" name="correo" placeholder="Correo electrónico" required />
                                                <span class="icon"><i class="lni lni-envelope"></i></span>
                                            </div>
                                        </div>

                                        <!-- Dirección -->
                                        <div class="col-md-12">
                                            <div class="input-style-3">
                                                <input type="text" name="direccion" placeholder="Dirección" />
                                                <span class="icon"><i class="lni lni-map-marker"></i></span>
                                            </div>
                                        </div>

                                        <!-- Estado -->
                                        <div class="col-md-12">
                                            <div class="select-style-1">
                                                <div class="select-position">
                                                    <select name="estado" required>
                                                        <option value="">Estado del docente</option>
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Botón -->
                                        <div class="col-md-12 text-center mt-3">
                                            <button type="submit" class="main-btn primary-btn btn-hover">
                                                Registrar Docente
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Designed and Developed by
                                <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                    PlainAdmin
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms d-flex justify-content-center justify-content-md-end">
                            <a href="#0" class="text-sm">Term & Conditions</a>
                            <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
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