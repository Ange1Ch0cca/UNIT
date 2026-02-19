<?php
require_once "../../../config/session.php";
require_once "../../controllers/DashboardController.php";

$controller = new DashboardController();

$userId = $_SESSION['id'];
$rol = $_SESSION['rol'];

$data = $controller->getDashboardData($userId, $rol);
$docentes = $controller->getDocentes();


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <title>Cursos | Error404</title>

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
                                <h2>Cursos</h2>
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
                                            Cursos
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

                                        <a href="add_curso.php"
                                            class="btn btn-primary"
                                            style="border-radius:8px; padding:6px 18px; font-weight:500;">

                                            <i class="mdi mdi-account-plus" style="font-size:20px; vertical-align:middle; margin-right:6px;"></i>
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
                                                <th>Foto</th>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th style="text-align:center;">Estado</th>
                                                <th style="text-align:center;">Acción</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php foreach ($docentes as $e): ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $nombre = $e['nombres']; // nombre completo del usuario
                                                        $inicial = strtoupper(substr(trim($nombre), 0, 1));

                                                        // Generar un color llamativo pero agradable usando HSL
                                                        $hue = rand(0, 360);          // tono al azar
                                                        $saturation = rand(60, 75);   // saturación media-alta
                                                        $lightness = rand(45, 55);    // luminosidad equilibrada
                                                        $colorFondo = "hsl($hue, {$saturation}%, {$lightness}%)";
                                                        ?>

                                                        <?php if (!empty($e['foto'])): ?>
                                                            <img src="<?php echo $e['foto']; ?>"
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



                                                    <td><?php echo htmlspecialchars($e['usuario']); ?></td>
                                                    <td><?php echo htmlspecialchars($e['nombres']); ?></td>
                                                    <td><?php echo htmlspecialchars($e['apellidos']); ?></td>

                                                    <!-- ESTADO -->
                                                    <td style="text-align:center;">
                                                        <?php
                                                        $estado = $e['estado'];

                                                        if ($estado == 1) {
                                                            $color = "#198754";
                                                            $icon = "mdi-check-circle-outline";
                                                            $texto = "Activo";
                                                        } elseif ($estado == 2) {
                                                            $color = "#fd7e14";
                                                            $icon = "mdi-lock";
                                                            $texto = "Bloqueado";
                                                        } else {
                                                            $color = "#dc3545";
                                                            $icon = "mdi-close-circle";
                                                            $texto = "Inactivo";
                                                        }
                                                        ?>

                                                        <button onclick="cambiarEstado(<?php echo $e['id']; ?>, <?php echo $estado; ?>)"
                                                            style="border:none;
        background:<?php echo $color; ?>;
        color:#fff;
        padding:5px 10px;
        border-radius:8px;
        font-size:12px;">

                                                            <i class="mdi <?php echo $icon; ?>" style="font-size:16px; vertical-align:middle; margin-right:4px;"></i>
                                                            <?php echo $texto; ?>
                                                        </button>
                                                    </td>


                                                    <!-- ACCION -->
                                                    <td style="text-align:center;">

                                                        <!-- VER INFO -->
                                                        <button title="Ver información"
                                                            onclick="verUsuario(<?php echo $e['id']; ?>)"
                                                            style="background:#17a2b8; color:#fff; border:none;
        padding:6px 8px; border-radius:8px;">
                                                            <i class="mdi mdi-eye" style="font-size:18px;"></i>
                                                        </button>

                                                        <!-- Editar -->
                                                        <button title="Editar"
                                                            onclick="editarUsuario(<?php echo $e['id']; ?>)"
                                                            style="background:#6f42c1; color:#fff; border:none;
        padding:6px 8px; border-radius:8px;">
                                                            <i class="mdi mdi-pencil" style="font-size:18px;"></i>
                                                        </button>

                                                        <?php if ($estado != 3): ?>
                                                            <!-- Inactivar -->
                                                            <button title="Inactivar"
                                                                onclick="inactivarUsuario(<?php echo $e['id']; ?>)"
                                                                style="background:#dc3545; color:#fff; border:none;
            padding:6px 8px; border-radius:8px;">
                                                                <i class="mdi mdi-account-off" style="font-size:18px;"></i>
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


        function cambiarEstado(id, estadoActual) {

            let nuevoEstado;

            if (estadoActual == 1) {
                nuevoEstado = 2; // Activo → Bloqueado
            } else {
                nuevoEstado = 1; // Bloqueado o Inactivo → Activo
            }

            fetch("../../controllers/CambiarEstadoUsuarioController.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "id=" + id + "&estado=" + nuevoEstado
                })
                .then(response => response.text())
                .then(data => {

                    if (data.trim() === "ok") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Estado actualizado',
                            text: 'El estado del usuario fue cambiado correctamente.',
                            confirmButtonColor: '#198754'
                        }).then(() => {
                            location.reload();
                        });

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'No se pudo actualizar el estado.'
                        });

                    }

                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error inesperado',
                        text: 'Ocurrió un problema en la petición.'
                    });
                });
        }



        function inactivarUsuario(id) {

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'El usuario será desactivado.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, desactivar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                if (result.isConfirmed) {

                    fetch("../../controllers/CambiarEstadoUsuarioController.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded"
                            },
                            body: "id=" + id + "&estado=3"
                        })
                        .then(response => response.text())
                        .then(data => {

                            if (data.trim() === "ok") {

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Usuario inactivado',
                                    text: 'El estado fue actualizado correctamente.',
                                    confirmButtonColor: '#198754'
                                }).then(() => {
                                    location.reload();
                                });

                            } else {

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'No se pudo desactivar el usuario.'
                                });

                            }

                        });

                }

            });
        }


        function editarUsuario(id) {
            window.location.href = "editar_curso.php?id=" + id;
        }

        function verUsuario(id) {

            fetch("../../services/obtener_usuario.php?id=" + id)
                .then(response => response.json())
                .then(data => {

                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    let fotoHTML = "";

                    if (data.foto && data.foto !== "") {
                        fotoHTML = `<img src="../../../resources/upload/photos/${data.foto}" 
                        style="width:140px;height:140px;border-radius:50%;object-fit:cover;">`;
                    } else {
                        let inicial = data.nombres.charAt(0).toUpperCase();
                        fotoHTML = `<div style="
                        width:140px;
                        height:140px;
                        border-radius:50%;
                        background:#6f42c1;
                        color:white;
                        font-size:55px;
                        display:flex;
                        align-items:center;
                        justify-content:center;">
                        ${inicial}
                        </div>`;
                    }

                    document.getElementById("modalFoto").innerHTML = fotoHTML;

                    document.getElementById("modalDatos").innerHTML = `
    <p><strong>ID:</strong> ${data.id ?? 'No registrada'}</p>
    <p><strong>Usuario:</strong> ${data.usuario ?? 'No registrada'}</p>
    <p><strong>Rol:</strong> ${data.rol ?? 'No registrada'}</p>
    <p><strong>DNI:</strong> ${data.dni ?? 'No registrada'}</p>
    <p><strong>Nombres:</strong> ${data.nombres ?? 'No registrada'}</p>
    <p><strong>Apellidos:</strong> ${data.apellidos ?? 'No registrada'}</p>
    <p><strong>Correo:</strong> ${data.correo ?? 'No registrada'}</p>
    <p><strong>Celular:</strong> ${data.celular ?? 'No registrada'}</p>
    <p><strong>Estado:</strong> ${data.estado_texto ?? 'No registrada'}</p>
    <p><strong>Profesión:</strong> ${data.profesion ?? 'No registrada'}</p>
    <p><strong>Fecha de ingreso:</strong> ${data.fecha_ingreso ?? 'No registrada'}</p>
    <p><strong>Fecha de registro:</strong> ${data.fecha_registro ?? 'No registrada'}</p>
`;


                    document.getElementById("modalUsuario").style.display = "flex";

                })
                .catch(error => {
                    console.error("Error al obtener usuario:", error);
                });
        }


        function cerrarModal() {
            document.getElementById("modalUsuario").style.display = "none";
        }
    </script>
</body>

</html>