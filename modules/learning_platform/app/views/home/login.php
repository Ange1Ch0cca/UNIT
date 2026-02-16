<?php
require_once "../../controllers/AuthController.php";

session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $auth = new AuthController();

    if ($auth->login($usuario, $password)) {
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
</head>
<body>

  <!-- Fondo azul con burbujas -->
  <div class="bg">
    <span class="bubble b1"></span>
    <span class="bubble b2"></span>
    <span class="bubble b3"></span>
    <span class="bubble b4"></span>
  </div>

  <main class="viewport">
    <section class="card">

      <!-- BURBUJAS -->
      <div class="bubble bubble-main">
        <h1>¡Bienvenido!</h1>
        <h3>Aprende de manera efectiva</h3>
        <p>
          Accede a tus cursos, revisa tus avances y descubre nuevos contenidos para seguir aprendiendo cada día.
        </p>
      </div>

      <span class="bubble bubble-2"></span>
      <span class="bubble bubble-3"></span>
      <span class="bubble bubble-4"></span>

      <!-- FORM -->
      <div class="form">
        <h2>Iniciar sesión</h2>
        <p class="subtitle">
          Ingresa con tu cuenta para acceder a la plataforma de aprendizaje
        </p>

        <!-- MENSAJE DE ERROR -->
        <?php if ($error): ?>
          <p style="color:red; font-size:14px; margin-bottom:10px;">
            <?php echo $error; ?>
          </p>
        <?php endif; ?>

        <form method="POST">

          <input 
            type="text" 
            name="usuario" 
            placeholder="Usuario o Correo Electrónico" 
            required 
          />

          <div class="password">
            <input 
              type="password" 
              name="password" 
              placeholder="Contraseña" 
              id="password" 
              required
            />
            <button type="button" id="togglePassword">MOSTRAR</button>
          </div>

          <div class="options">
            <label>
              <input type="checkbox" /> Recordarme
            </label>
            <a href="#">¿Olvidaste tu contraseña?</a>
          </div>

          <button class="btn primary" type="submit">
            Ingresar
          </button>

        </form>

        <p class="signup">
          ¿No tienes cuenta? <a href="register.php">Regístrate</a>
        </p>
      </div>

    </section>
  </main>

  <script src="../../../assets/js/mainlogin.js"></script>
</body>
</html>
