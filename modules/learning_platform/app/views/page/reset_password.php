<?php
require_once "../../../config/session.php";
require_once "../../../config/database.php";
require_once "../../controllers/DashboardController.php";

$database = new Database();
$conn = $database->conectar();

$controller = new DashboardController($conn);

$rol = $_SESSION['rol'];

// Traer todos los usuarios excepto admin (rol_id = 1)
$usuarios = $controller->getUsuariosSinAdmin();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>Reset Password | Error404</title>

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
                                <h2>Reset Password</h2>
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
                                            Reset Password
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
     USUARIOS (TABLA)
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
                                                <th>Foto</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th style="text-align:center;">Estado</th>
                                                <th style="text-align:center;">Acción</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php foreach ($usuarios as $u): ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $nombre = $u['nombres']; // nombre completo del usuario
                                                        $inicial = strtoupper(substr(trim($nombre), 0, 1));

                                                        // Generar un color llamativo pero agradable usando HSL
                                                        $hue = rand(0, 360);          // tono al azar
                                                        $saturation = rand(60, 75);   // saturación media-alta
                                                        $lightness = rand(45, 55);    // luminosidad equilibrada
                                                        $colorFondo = "hsl($hue, {$saturation}%, {$lightness}%)";
                                                        ?>

                                                        <?php if (!empty($u['foto'])): ?>
                                                            <img src="<?php echo $u['foto']; ?>"
                                                                style="width:40px; height:40px; border-radius:50%; object-fit:cover;">
                                                        <?php else: ?>
                                                            <div style="
        width:40px;
        height:40px;
        border-radius:50%;
        background:<?php echo $colorFondo; ?>;
        color:#fff;
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:bold;
        font-size:16px;">
                                                                <?php echo $inicial; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>



                                                    <td><?php echo htmlspecialchars($u['usuario']); ?></td>
                                                    <td><?php echo htmlspecialchars($u['nombres']); ?></td>
                                                    <td><?php echo htmlspecialchars($u['apellidos']); ?></td>

                                                    <!-- ESTADO -->
                                                    <td style="text-align:center;">
                                                        <?php if (password_verify("Error404", $u['password'])): ?>
                                                            <span class="badge bg-warning text-dark">Reseteado</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-success">Normal</span>
                                                        <?php endif; ?>
                                                    </td>


                                                    <!-- ACCION -->
                                                    <td style="text-align:center;">
                                                        <button title="Resetear contraseña"
                                                            onclick="resetPassword(<?= $u['id'] ?>, '<?= htmlspecialchars($u['usuario']) ?>')"
                                                            style="background:#dc3545; color:#fff; border:none;
        padding:6px 8px; border-radius:8px;">
                                                            <i class="mdi mdi-lock-reset" style="font-size:18px;"></i>
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
                    searchPlaceholder: "Buscar usuario...",
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

        function resetPassword(id, usuario) {

            Swal.fire({
                title: '¿Resetear contraseña?',
                text: 'La contraseña será cambiada a: Error404',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, resetear',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch("../../controllers/ResetPasswordController.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id=" + id
                        })
                        .then(response => response.text())
                        .then(data => {

                            if (data.trim() === "ok") {

                                mostrarCredenciales(usuario);

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error al resetear'
                                });
                            }

                        });

                }

            });
        }

        function mostrarCredenciales(usuario) {

            const hora = new Date().getHours();
            let saludo = "";

            if (hora < 12) {
                saludo = "Buenos días";
            } else if (hora < 18) {
                saludo = "Buenas tardes";
            } else {
                saludo = "Buenas noches";
            }

            const contenido = `
        <div id="credencialesContent" style="text-align:left; font-family:Arial;">

            <h3 style="text-align:center; margin-bottom:15px;">
                Nuevas Credenciales
            </h3>

            <p>${saludo},</p>

            <p>
                Le damos la bienvenida al sistema institucional. 
                A continuación, se detallan sus nuevas credenciales de acceso:
            </p>

            <table border="1" cellpadding="10" cellspacing="0" 
                style="width:100%; border-collapse:collapse; text-align:center; margin:15px 0;">
                <tr style="background:#f2f2f2; font-weight:bold;">
                    <td>Usuario</td>
                    <td>Contraseña</td>
                </tr>
                <tr>
                    <td>${usuario}</td>
                    <td>Error404</td>
                </tr>
            </table>

            <p style="font-size:13px;">
                Por motivos de seguridad, se recomienda cambiar la contraseña 
                inmediatamente después de iniciar sesión.
            </p>

            <p style="font-size:13px;">
                No comparta sus credenciales con ninguna persona, 
                incluso si se trata de la contraseña por defecto del sistema.
            </p>

        </div>
    `;

            Swal.fire({
                html: contenido,
                width: 600,
                showConfirmButton: false,
                showCloseButton: true,
                didOpen: () => {

                    const footer = document.createElement("div");
                    footer.style.textAlign = "right";
                    footer.style.marginTop = "15px";

                    footer.innerHTML = `
                <button id="btnCopiar" class="swal2-confirm swal2-styled" 
                    style="background:#0d6efd; margin-right:10px;">
                    Copiar
                </button>
                <button id="btnImprimir" class="swal2-confirm swal2-styled" 
                    style="background:#198754;">
                    Imprimir
                </button>
            `;

                    Swal.getHtmlContainer().appendChild(footer);

                    document.getElementById("btnCopiar").onclick = function() {
                        copiarCredenciales();
                    };

                    document.getElementById("btnImprimir").onclick = function() {
                        imprimirCredenciales();
                    };
                }
            });
        }

        function copiarCredenciales() {

            const contenido = document.getElementById("credencialesContent").innerText;

            navigator.clipboard.writeText(contenido).then(() => {

                Swal.fire({
                    icon: 'success',
                    title: 'Copiado correctamente',
                    timer: 1500,
                    showConfirmButton: false
                });

            });
        }

        function imprimirCredenciales() {

            const usuario = document.querySelector("#credencialesContent table tr:nth-child(2) td:nth-child(1)").innerText;

            const fechaActual = new Date();
            const fechaFormateada = fechaActual.toLocaleDateString('es-BO', {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            const horaFormateada = fechaActual.toLocaleTimeString('es-BO');

            const ventana = window.open('', '', 'width=900,height=700');

            ventana.document.write(`<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Credenciales de Acceso</title>
<style>
@page {
    size: A4;
    margin: 0;
}

html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.contenedor {
    width: 190mm;   /* ancho real seguro dentro de A4 */
    margin: 10mm auto;
    padding: 8mm;
    box-sizing: border-box;
    border: 1px solid #000;
}

.logo {
    text-align: center;
    margin-bottom: 5mm;
}

.logo img {
    max-height: 18mm;
}

.titulo {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 4mm;
}

.fecha {
    text-align: right;
    font-size: 11px;
    margin-bottom: 4mm;
}

.mensaje {
    font-size: 12px;
    margin-bottom: 4mm;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 4mm 0;
}

table, td {
    border: 1px solid #000;
}

td {
    padding: 4mm;
    text-align: center;
    font-size: 13px;
}

.nota {
    font-size: 10px;
    margin-top: 3mm;
}

.firma {
    margin-top: 8mm;
    font-size: 11px;
}

.firma-linea {
    margin-top: 12mm;
    border-top: 1px solid #000;
    width: 60mm;
}

.pie {
    margin-top: 3mm;
    font-size: 9px;
    text-align: center;
    color: #555;
}

.corte {
    border-top: 1px dashed #000;
    margin: 8mm 0;
}
</style>

</head>
<body>

<div class="contenedor">

    <div class="logo">
        <img src="../../assets/images/logo/">
    </div>

    <div class="titulo">
        NUEVAS CREDENCIALES DE ACCESO
    </div>

    <div class="fecha">
        Fecha: ${fechaFormateada} - ${horaFormateada}
    </div>

    <div class="mensaje">
        A continuación se detallan sus credenciales institucionales:
    </div>

    <table>
        <tr style="font-weight:bold; background:#f2f2f2;">
            <td>Usuario</td>
            <td>Contraseña</td>
        </tr>
        <tr>
            <td>${usuario}</td>
            <td>Error404</td>
        </tr>
    </table>

    <div class="nota">
        Por seguridad, cambie la contraseña después del primer inicio de sesión.
    </div>

    <div class="firma">
        <div class="firma-linea"></div>
        Sistema Institucional<br>
        Departamento de Tecnología
    </div>

    <div class="pie">
        Documento generado automáticamente por el sistema.
    </div>

</div>

<div class="corte"></div>

</body>
</html>`);

            ventana.document.close();

            // Esperar a que cargue antes de imprimir
            ventana.onload = function() {
                ventana.print();
            };
        }
    </script>
</body>

</html>