<?php
require_once "../../controllers/AuthController.php";

$mensaje = "";
$tipoMensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $auth = new AuthController();

    $datos = [
        "nombres"   => $_POST["nombres"],
        "apellidos" => $_POST["apellidos"],
        "dni"       => $_POST["dni"],
        "password"  => $_POST["password"]
    ];

    $resultado = $auth->register($datos);

    if (is_array($resultado) && $resultado[0] == "ok") {
        $mensaje = "Registro exitoso. Tu usuario es: " . $resultado[1];
        $tipoMensaje = "success";
    } elseif ($resultado == "dni_existe") {
        $mensaje = "Este DNI ya está registrado.";
        $tipoMensaje = "error";
    } else {
        $mensaje = "Ocurrió un error.";
        $tipoMensaje = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link rel="stylesheet" href="../../../assets/css/stylelogin.css" />

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

<div class="bg">
    <span class="bubble b1"></span>
    <span class="bubble b2"></span>
    <span class="bubble b3"></span>
    <span class="bubble b4"></span>
</div>

<main class="viewport">
<section class="card">

<div class="bubble bubble-main">
    <h1>¡Bienvenido!</h1>
    <h3>Únete y empieza a aprender</h3>
    <p>
        Regístrate para acceder a tus cursos y seguir tu progreso.
    </p>
</div>

<span class="bubble bubble-2"></span>
<span class="bubble bubble-3"></span>
<span class="bubble bubble-4"></span>

<div class="form">
    <h2>Crear cuenta</h2>
    <p class="subtitle">
        Ingresa tus datos para registrarte como estudiante.
    </p>

    <?php if ($mensaje): ?>
        <p style="
            color: <?= $tipoMensaje == 'error' ? '#ff4d4d' : '#28a745'; ?>;
            font-size:14px;
            margin-bottom:15px;
        ">
            <?= $mensaje ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <!-- FILA 1 -->
        <div style="display:flex; gap:15px; margin-bottom:15px;">
            <input type="text" 
                   name="nombres" 
                   placeholder="Nombres"
                   required
                   style="flex:1; padding:12px; border-radius:8px; border:1px solid #ccc;" />

            <input type="text" 
                   name="apellidos" 
                   placeholder="Apellidos"
                   required
                   style="flex:1; padding:12px; border-radius:8px; border:1px solid #ccc;" />
        </div>

        <!-- FILA 2 -->
        <div style="display:flex; gap:15px; margin-bottom:20px;">

            <input type="text" 
                   name="dni" 
                   placeholder="DNI"
                   maxlength="8"
                   required
                   style="flex:1; padding:12px; border-radius:8px; border:1px solid #ccc;" />

            <!-- PASSWORD CON ICONO -->
            <div style="flex:1; position:relative;">
                <input type="password" 
                       name="password"
                       id="password"
                       placeholder="Contraseña"
                       required
                       style="width:100%; padding:12px; border-radius:8px; border:1px solid #ccc; padding-right:40px;" />

                <i class="fa-solid fa-eye"
                   id="togglePassword"
                   style="
                       position:absolute;
                       right:12px;
                       top:50%;
                       transform:translateY(-50%);
                       cursor:pointer;
                       color:#666;
                   ">
                </i>
            </div>

        </div>

        <!-- BOTÓN -->
        <button class="btn primary" 
                type="submit"
                style="
                    width:100%;
                    height:45px;
                    border-radius:8px;
                ">
            Registrarse
        </button>

    </form>

    <p class="signup" style="margin-top:15px;">
        ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
    </p>
</div>

</section>
</main>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        this.classList.toggle("fa-eye-slash");
    });
</script>

</body>
</html>
