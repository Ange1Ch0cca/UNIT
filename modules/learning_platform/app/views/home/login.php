<?php
require_once "../../controllers/AuthController.php";

session_start();

$error = "";

// RECORDAR USUARIO
$usuario_recordado = "";
if (isset($_COOKIE["usuario_recordado"])) {
  $usuario_recordado = $_COOKIE["usuario_recordado"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  $auth = new AuthController();

  if ($auth->login($usuario, $password)) {

    // Guardar cookie si marcó recordar
    if (isset($_POST["recordar"])) {
      setcookie("usuario_recordado", $usuario, time() + (86400 * 30), "/");
    } else {
      setcookie("usuario_recordado", "", time() - 3600, "/");
    }

    header("Location: ../page/dashboard.php");
    exit;
  } else {
    $error = "Usuario o contraseña incorrectos";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../../../assets/css/stylelogin.css" />

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

  <!-- ALERTA VISUAL -->
  <div id="customAlert" style="
      position:fixed;
      top:20px;
      left:50%;
      transform:translateX(-50%);
      background:#ff1e1e;
      color:white;
      padding:12px 20px;
      border-radius:8px;
      font-size:14px;
      box-shadow:0 6px 18px rgba(0,0,0,0.15);
      display:none;
      z-index:9999;
      transition:opacity 0.3s;
  "></div>

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
        <h3>Aprende de manera efectiva</h3>
        <p>
          Accede a tus cursos y revisa tus avances.
        </p>
      </div>

      <span class="bubble bubble-2"></span>
      <span class="bubble bubble-3"></span>
      <span class="bubble bubble-4"></span>

      <div class="form">
        <h2 id="formTitle">Iniciar sesión</h2>
        <p class="subtitle" id="formSubtitle">
          Ingresa con tu cuenta para acceder a la plataforma.
        </p>

        <form method="POST" id="loginForm" novalidate>

          <div id="loginFields">

            <input
              type="text"
              name="usuario"
              placeholder="Usuario"
              value="<?php echo $usuario_recordado; ?>"
              required />

            <div class="password" style="position: relative; width: 100%;">
              <input
                type="password"
                name="password"
                placeholder="Contraseña"
                id="password"
                required
                style="width: 100%; padding-right: 30px;" />
              <i
                class="fa-solid fa-eye"
                id="togglePassword"
                style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
              </i>
            </div>

            <div class="options">
              <label>
                <input type="checkbox" name="recordar"> Recordarme
              </label>
              <a href="#" id="forgotLink">¿Olvidaste tu contraseña?</a>
            </div>

            <button class="btn primary" type="submit" name="login">
              Ingresar
            </button>

          </div>

          <!-- RECUPERACIÓN -->
          <div id="recoveryFields" style="display:none;">

            <input type="text" id="recUsuario" placeholder="Usuario" required />

            <input type="text" id="recNombre" placeholder="Nombres y apellidos" required />

            <p style="font-size:13px; margin:10px 0;">
              Enviar solicitud por:
            </p>

            <div style="display: flex; gap: 8px; flex-wrap: wrap; justify-content: center;">
              <button type="button" onclick="enviarCorreo()"
                style="background:white; color:#4285F4; border:1px solid #ddd; padding:8px 16px; border-radius:4px;">
                <i class="fa-brands fa-google" style="margin-right: 8px;"></i> Correo
              </button>

              <button type="button" onclick="enviarWhatsapp()"
                style="background:#25D366; color:white; border:1px solid #25D366; padding:8px 16px; border-radius:4px;">
                <i class="fa-brands fa-whatsapp" style="margin-right: 8px;"></i> WhatsApp
              </button>

              <button type="button" onclick="modoSalon()"
                style="background:#123776; color:white; border:1px solid #123776; padding:8px 16px; border-radius:4px;">
                <i class="fa fa-university" style="margin-right: 8px;"></i> Estoy en el colegio
              </button>
            </div>

            <p id="recoveryMsg" style="font-size:12px; margin-top:10px;"></p>

          </div>


        </form>

        <p class="signup">
          ¿No tienes cuenta? <a href="register.php">Regístrate</a>
        </p>

      </div>
    </section>
  </main>

  <script>
    // ALERTA VISUAL
    function showAlert(mensaje) {
      const alertBox = document.getElementById("customAlert");
      alertBox.innerText = mensaje;
      alertBox.style.display = "block";
      alertBox.style.opacity = "1";

      setTimeout(() => {
        alertBox.style.opacity = "0";
        setTimeout(() => {
          alertBox.style.display = "none";
        }, 300);
      }, 2500);
    }

    // Toggle contraseña
    document.getElementById("togglePassword").onclick = function() {
      const input = document.getElementById("password");
      input.type = input.type === "password" ? "text" : "password";
      this.classList.toggle("fa-eye-slash");
    };

    // Cambiar a recuperación
    document.getElementById("forgotLink").onclick = function(e) {
      e.preventDefault();

      document.getElementById("loginFields").style.display = "none";
      document.getElementById("recoveryFields").style.display = "block";

      document.getElementById("formTitle").innerText = "Recuperar acceso";
      document.getElementById("formSubtitle").innerText = "Solicita nuevas credenciales.";
    };

    // Saludo automático
    function saludo() {
      const hora = new Date().getHours();
      if (hora < 12) return "Buenos días";
      if (hora < 18) return "Buenas tardes";
      return "Buenas noches";
    }

    // Generar mensaje
    function generarMensaje(metodo) {
      let usuario = document.getElementById("recUsuario").value;
      let nombre = document.getElementById("recNombre").value;

      if (!usuario || !nombre) {
        showAlert("Completa usuario y nombre completo.");
        return null;
      }

      let msg = `${saludo()}, necesito ayuda para recuperar mi acceso.\n` +
        `Mi nombre es: ${nombre}\n` +
        `Mi usuario es: ${usuario}\n` +
        `Muchas gracias.`;

      document.getElementById("recoveryMsg").innerText =
        `Solicitud enviada por ${metodo}. Espera respuesta por el mismo medio.`;

      return encodeURIComponent(msg);
    }

    function enviarCorreo() {
      let msg = generarMensaje("correo");
      if (!msg) return;
      window.location.href = `mailto:admin@error404.pe?subject=Recuperación de acceso&body=${msg}`;
    }

    function enviarWhatsapp() {
      let msg = generarMensaje("WhatsApp");
      if (!msg) return;
      window.open(`https://wa.me/906829934?text=${msg}`, "_blank");
    }

    function modoSalon() {
  let usuario = document.getElementById("recUsuario").value;
  let nombre = document.getElementById("recNombre").value;

  if (!usuario || !nombre) {
    showAlert("Completa usuario y nombre completo.");
    return;
  }

  fetch("../../controllers/ResetController.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: `usuario=${encodeURIComponent(usuario)}&nombre=${encodeURIComponent(nombre)}`
  })
  .then(response => response.text())
  .then(data => {
    showAlert("Solicitud enviada correctamente.");
    document.getElementById("recoveryMsg").innerText =
      "El administrador revisará tu solicitud. Acercate a la sala de cómputo por tus nuevas credenciales. Gracias por tu paciencia.";
  })
  .catch(error => {
    showAlert("Error al enviar la solicitud.");
  });
}

    <?php if ($error): ?>
      showAlert(<?php echo json_encode($error); ?>);
    <?php endif; ?>

    // VALIDACIÓN BONITA PARA LOGIN
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      const usuario = this.querySelector('input[name="usuario"]').value.trim();
      const password = this.querySelector('input[name="password"]').value.trim();

      if (!usuario || !password) {
        e.preventDefault();
        showAlert("Ingresa tu usuario y contraseña para continuar.");
      }
    });
  </script>

</body>

</html>