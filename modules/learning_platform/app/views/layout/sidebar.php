<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$rol = $_SESSION['rol'] ?? '';
?>


<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="dashboard.php">
            <img src="../../../assets/images/logo/logo_sidebar-01.svg" alt="logo" />
        </a>
    </div>
    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="dashboard.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,1L3,5V11C3,16.55 6.84,21.74 12,23C17.16,21.74 21,16.55 21,11V5L12,1M12,7A3,3 0 0,1 15,10A3,3 0 0,1 12,13A3,3 0 0,1 9,10A3,3 0 0,1 12,7M12,14.5C14.33,14.5 18,15.67 18,18V19H6V18C6,15.67 9.67,14.5 12,14.5Z" />
                        </svg>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <?php if ($rol === 'admin'): ?>
            <li class="nav-item">
                <a href="estudiantes.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16,13C15.71,13 15.38,13 15.03,13.05C16.19,13.89 17,15.1 17,16.5V19H22V16.5C22,14.67 18.33,13.71 16,13M8,13C5.67,13 2,13.96 2,15.8V18H14V15.8C14,13.96 10.33,13 8,13M8,11A3,3 0 0,0 11,8A3,3 0 0,0 8,5A3,3 0 0,0 5,8A3,3 0 0,0 8,11M16,11A3,3 0 0,0 19,8A3,3 0 0,0 16,5A3,3 0 0,0 13,8A3,3 0 0,0 16,11Z" />
                        </svg>
                    </span>
                    <span class="text">Estudiantes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="estudiante_grado.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.82 17L13 19.28V22H6C4.89 22 4 21.11 4 20V4C4 2.9 4.89 2 6 2H7V9L9.5 7.5L12 9V2H18C19.1 2 20 2.89 20 4V12.54L18.5 11.72L8.82 17M24 17L18.5 14L13 17L18.5 20L24 17M15 19.09V21.09L18.5 23L22 21.09V19.09L18.5 21L15 19.09Z" />
                        </svg>
                    </span>
                    <span class="text">Asignación E.G.</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="docentes.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 3C14.21 3 16 4.79 16 7S14.21 11 12 11 8 9.21 8 7 9.79 3 12 3M16 13.54C16 14.6 15.72 17.07 13.81 19.83L13 15L13.94 13.12C13.32 13.05 12.67 13 12 13S10.68 13.05 10.06 13.12L11 15L10.19 19.83C8.28 17.07 8 14.6 8 13.54C5.61 14.24 4 15.5 4 17V21H20V17C20 15.5 18.4 14.24 16 13.54Z" />
                        </svg>
                    </span>
                    <span class="text">Docentes</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="cursos.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.82 17L13 19.28V22H6C4.89 22 4 21.11 4 20V4C4 2.9 4.89 2 6 2H7V9L9.5 7.5L12 9V2H18C19.1 2 20 2.89 20 4V12.54L18.5 11.72L8.82 17M24 17L18.5 14L13 17L18.5 20L24 17M15 19.09V21.09L18.5 23L22 21.09V19.09L18.5 21L15 19.09Z" />
                        </svg>
                    </span>
                    <span class="text">Cursos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="grados.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23,2H1A1,1 0 0,0 0,3V21A1,1 0 0,0 1,22H23A1,1 0 0,0 24,21V3A1,1 0 0,0 23,2M22,20H20V19H15V20H2V4H22V20M10.29,9.71A1.71,1.71 0 0,1 12,8C12.95,8 13.71,8.77 13.71,9.71C13.71,10.66 12.95,11.43 12,11.43C11.05,11.43 10.29,10.66 10.29,9.71M5.71,11.29C5.71,10.58 6.29,10 7,10A1.29,1.29 0 0,1 8.29,11.29C8.29,12 7.71,12.57 7,12.57C6.29,12.57 5.71,12 5.71,11.29M15.71,11.29A1.29,1.29 0 0,1 17,10A1.29,1.29 0 0,1 18.29,11.29C18.29,12 17.71,12.57 17,12.57C16.29,12.57 15.71,12 15.71,11.29M20,15.14V16H16L14,16H10L8,16H4V15.14C4,14.2 5.55,13.43 7,13.43C7.55,13.43 8.11,13.54 8.6,13.73C9.35,13.04 10.7,12.57 12,12.57C13.3,12.57 14.65,13.04 15.4,13.73C15.89,13.54 16.45,13.43 17,13.43C18.45,13.43 20,14.2 20,15.14Z" />
                        </svg>
                    </span>
                    <span class="text">Grados</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="curso_grado_docente.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.82 17L13 19.28V22H6C4.89 22 4 21.11 4 20V4C4 2.9 4.89 2 6 2H7V9L9.5 7.5L12 9V2H18C19.1 2 20 2.89 20 4V12.54L18.5 11.72L8.82 17M24 17L18.5 14L13 17L18.5 20L24 17M15 19.09V21.09L18.5 23L22 21.09V19.09L18.5 21L15 19.09Z" />
                        </svg>
                    </span>
                    <span class="text">Asignación C.G.D.</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="calificaciones_admin.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13,2L3,2V22H21V10L13,2M13,3.5L18.5,9H13V3.5M10.8,11.3L13.1,19H11L10.5,17.4H7.8L7.3,19H5.2L7.5,11.3H10.8M8.2,15.8H10.1L9.1,12.7L8.2,15.8M15,13V15H13V13H15M17,13V15H15V13H17M15,11V13H13V11H15M17,11V13H15V11H17Z" />
                        </svg>
                    </span>
                    <span class="text">Calificaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="reset_password.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.63,2C18.16,2 22.64,6.5 22.64,12C22.64,17.5 18.16,22 12.63,22C9.12,22 6.05,20.18 4.26,17.43L5.84,16.18C7.25,18.47 9.76,20 12.64,20A8,8 0 0,0 20.64,12A8,8 0 0,0 12.64,4C8.56,4 5.2,7.06 4.71,11H7.47L3.73,14.73L0,11H2.69C3.19,5.95 7.45,2 12.63,2M15.59,10.24C16.09,10.25 16.5,10.65 16.5,11.16V15.77C16.5,16.27 16.09,16.69 15.58,16.69H10.05C9.54,16.69 9.13,16.27 9.13,15.77V11.16C9.13,10.65 9.54,10.25 10.04,10.24V9.23C10.04,7.7 11.29,6.46 12.81,6.46C14.34,6.46 15.59,7.7 15.59,9.23V10.24M12.81,7.86C12.06,7.86 11.44,8.47 11.44,9.23V10.24H14.19V9.23C14.19,8.47 13.57,7.86 12.81,7.86Z" />
                        </svg>
                    </span>
                    <span class="text">Reset Passwords</span>
                </a>
            </li>
            <?php endif; ?>
            <span class="divider">
                <hr />
            </span>
            <?php if ($rol === 'admin' || $rol === 'estudiante'): ?>
            <li class="nav-item">
                <a href="inicio.php">
                    <span class="icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8C16 10.21 14.21 12 12 12C9.79 12 8 10.21 8 8L8.11 7.06L5 5.5L12 2L19 5.5V10.5H18V6L15.89 7.06L16 8M12 14C16.42 14 20 15.79 20 18V20H4V18C4 15.79 7.58 14 12 14Z" />
                        </svg>
                    </span>
                    <span class="text">Inicio</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="materiales.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15 8C12.79 8 11 9.79 11 12V20H4C2.9 20 2 19.11 2 18V6C2 4.89 2.89 4 4 4H10L12 6H20C21.1 6 22 6.89 22 8V10.17L20.41 8.59L19.83 8H15M23 14V21C23 22.11 22.11 23 21 23H15C13.9 23 13 22.11 13 21V12C13 10.9 13.9 10 15 10H19L23 14M21 14.83L18.17 12H18V15H21V14.83Z" />
                        </svg>
                    </span>

                    <span class="text">Materiales</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="actividades.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17,4V10L15,8L13,10V4H9V20H19V4H17M3,7V5H5V4C5,2.89 5.9,2 7,2H19C20.1,2 21,2.9 21,4V20C21,21.1 20.1,22 19,22H7C5.9,22 5,21.1 5,20V19H3V17H5V15H3V13H5V11H3V9H5V7H3M7,4V20H19V4H7Z" />
                        </svg>
                    </span>


                    <span class="text">Actividades</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="calificaciones.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13,2L3,2V22H21V10L13,2M13,3.5L18.5,9H13V3.5M10.8,11.3L13.1,19H11L10.5,17.4H7.8L7.3,19H5.2L7.5,11.3H10.8M8.2,15.8H10.1L9.1,12.7L8.2,15.8M15,13V15H13V13H15M17,13V15H15V13H17M15,11V13H13V11H15M17,11V13H15V11H17Z" />
                        </svg>
                    </span>


                    <span class="text">Calificaciones</span>
                </a>
            </li>
            <?php endif; ?>
            <span class="divider">
                <hr />
            </span>
            <?php if ($rol === 'admin' || $rol === 'docente'): ?>
            <li class="nav-item">
                <a href="panel.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <!-- Pizarra de fondo -->
                            <path d="M20,17H22V5H2V17H11.5V19H8V21H16V19H12.5V17H20M3,6H21V16H3V6Z" opacity="0.3" />
                            <!-- Silueta neutra con puntero/libro -->
                            <path d="M9,5A4,4 0 0,1 13,9A4,4 0 0,1 9,13A4,4 0 0,1 5,9A4,4 0 0,1 9,5M9,15C11.67,15 17,16.34 17,19V21H1V19C1,16.34 6.33,15 9,15Z" />
                        </svg>
                    </span>
                    <span class="text">Panel</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="add-materiales.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15 8C12.79 8 11 9.79 11 12V20H4C2.9 20 2 19.11 2 18V6C2 4.89 2.89 4 4 4H10L12 6H20C21.1 6 22 6.89 22 8V10.17L20.41 8.59L19.83 8H15M23 14V21C23 22.11 22.11 23 21 23H15C13.9 23 13 22.11 13 21V12C13 10.9 13.9 10 15 10H19L23 14M21 14.83L18.17 12H18V15H21V14.83Z" />
                        </svg>
                    </span>

                    <span class="text">Add Materiales</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="add-actividades.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17,4V10L15,8L13,10V4H9V20H19V4H17M3,7V5H5V4C5,2.89 5.9,2 7,2H19C20.1,2 21,2.9 21,4V20C21,21.1 20.1,22 19,22H7C5.9,22 5,21.1 5,20V19H3V17H5V15H3V13H5V11H3V9H5V7H3M7,4V20H19V4H7Z" />
                        </svg>
                    </span>


                    <span class="text">Add Actividades</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="add-calificaciones.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13,2L3,2V22H21V10L13,2M13,3.5L18.5,9H13V3.5M10.8,11.3L13.1,19H11L10.5,17.4H7.8L7.3,19H5.2L7.5,11.3H10.8M8.2,15.8H10.1L9.1,12.7L8.2,15.8M15,13V15H13V13H15M17,13V15H15V13H17M15,11V13H13V11H15M17,11V13H15V11H17Z" />
                        </svg>
                    </span>


                    <span class="text">Add Calificaciones</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="add-asistencia.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0 0 5,21H19A2,2 0 0 0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />
                        </svg>
                    </span>


                    <span class="text">Add Asistencia</span>
                </a>
            </li>

            <span class="divider">
                <hr />
            </span>

            <li class="nav-item">
                <a href="registro-auxiliar.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0 1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M7,12V14H17V12H7M7,16V18H17V16H7M7,8V10H11V8H7Z" />
                        </svg>
                    </span>


                    <span class="text">Registro Auxiliar</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="registro-asistencia.php">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19,19H5V8H19M16,1V3H8V1H6V3H5C3.89,3 3,3.89 3,5V19A2,2 0 0 0 5,21H19A2,2 0 0 0 21,19V5C21,3.89 20.1,3 19,3H18V1M17,12H12V17H17V12Z" />
                        </svg>
                    </span>


                    <span class="text">Registro Asistencia</span>
                </a>
            </li>
            <?php endif; ?>
            <span class="divider">
                <hr />
            </span>
            <?php if ($rol === 'admin'): ?>

            <li class="nav-item nav-item-has-children">
                <a
                    href="#0"
                    class="collapsed"
                    data-bs-toggle="collapse"
                    data-bs-target="#ddmenu_2"
                    aria-controls="ddmenu_2"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon">
                        <svg xmlns="http://www.w3.org" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 7H3V3H21V7M9.5 11H14.5C14.78 11 15 11.22 15 11.5V12.06C15.87 10.83 17.35 10 19 10C19.34 10 19.68 10.04 20 10.11V8H4V21H13.03C13 20.9 13 20.8 13 20.7V17.2C13 16.24 13.5 15.34 14.2 14.74V14.5C14.2 14 14.32 13.47 14.5 13H9V11.5C9 11.22 9.22 11 9.5 11M23 17.3V20.8C23 21.4 22.4 22 21.7 22H16.2C15.6 22 15 21.4 15 20.7V17.2C15 16.6 15.6 16 16.2 16V14.5C16.2 13.1 17.6 12 19 12S21.8 13.1 21.8 14.5V16C22.4 16 23 16.6 23 17.3M20.5 14.5C20.5 13.7 19.8 13.2 19 13.2S17.5 13.7 17.5 14.5V16H20.5V14.5Z" />
                        </svg>
                    </span>
                    <span class="text">Otros</span>
                </a>
                <ul id="ddmenu_2" class="collapse dropdown-nav">
                    <li>
                        <a href="formatos.php"> Formatos </a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!--Caja de Actualiza-->
    <div class="promo-box">
        <div class="promo-icon">
            <img class="mx-auto" src="./../../../assets/images/logo/logo-icon-big.svg" alt="Logo">
        </div>
        <h3>Actualizar a PRO</h3>
        <p>¡Mejore su proceso de desarrollo y comience a hacer más con PlainAdmin PRO!</p>
        <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
            Actualizar a PRO
        </a>
    </div>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->

<script>
    const currentPage = window.location.pathname.split("/").pop();

    document.querySelectorAll(".sidebar-nav a").forEach(link => {
        const parentItem = link.closest(".nav-item");

        if (link.getAttribute("href") === currentPage) {
            parentItem?.classList.add("active");

            // Si está dentro de un submenú
            const collapseMenu = link.closest(".collapse");
            if (collapseMenu) {
                collapseMenu.classList.add("show");
                collapseMenu
                    .closest(".nav-item")
                    .querySelector("a[data-bs-toggle='collapse']")
                    ?.classList.remove("collapsed");
            }
        } else {
            parentItem?.classList.remove("active");
        }
    });
</script>