<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

  <!-- SEO Omitido de Indexación para Errores -->
  <title>Error 404 - Página no encontrada | UNIT</title>
  <meta name="description" content="La página que buscas no existe o ha sido movida. Regresa al inicio de UNIT para seguir optimizando tu empresa." />
  <meta name="robots" content="noindex, follow" />
  <meta name="theme-color" content="#0B1220" />

  <!-- Iconos Corporativos -->
  <link rel="icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />
  <link rel="shortcut icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />

  <!-- Dependencias de Rendimiento -->
  <link rel="preconnect" href="https://googleapis.com" />
  <link rel="preconnect" href="https://gstatic.com" crossorigin />
  <link href="https://googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Sora:wght@700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
  <link rel="stylesheet" href="https://cloudflare.com" />
  
  <!-- Hojas de Estilo Separadas -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/error404.css" />
</head>
<body>

<!-- Custom Cursor de UNIT -->
<div class="cursor-glow" id="cGlow"></div>
<div class="cursor-ring" id="cRing"></div>
<div class="cursor-dot"  id="cDot"></div>

<!-- ============================
     NAVBAR CORPORATIVO
============================ -->
<header>
  <nav class="navbar">
    <a href="./" class="logo" id="logo-link">
      <img src="./assets/img/icon/LogoUnitNew-01.webp" alt="UNIT" class="logo-img" />
    </a>

    <ul class="nav-links">
      <li><a href="./#servicios">Servicios</a></li>
      <li><a href="./#ecosistema-digital">Ecosistema</a></li>
      <li><a href="./#portafolio">Portafolio</a></li>
      <li><a href="./#proceso">Proceso</a></li>
      <li><a href="./#contacto">Contacto</a></li>
    </ul>

    <div class="nav-right">
      <a class="nav-whatsapp" href="https://wa.me" target="_blank" rel="noopener">
        <i class="fa-brands fa-whatsapp"></i>
        <span class="wh-label">WhatsApp</span>
      </a>
      <a href="./#contacto" class="nav-cta" style="display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
        Empezar proyecto →
      </a>
      <button class="nav-hamburger" id="hamburger" aria-label="Menú" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- Mobile Drawer -->
  <div class="mobile-menu" id="mobileMenu" role="navigation">
    <a href="./#servicios" class="mobile-nav-link">Servicios</a>
    <a href="./#ecosistema-digital" class="mobile-nav-link">Ecosistema</a>
    <a href="./#portafolio" class="mobile-nav-link">Portafolio</a>
    <a href="./#proceso" class="mobile-nav-link">Proceso</a>
    <a href="./#contacto" class="mobile-nav-link">Contacto</a>
    <div class="mobile-menu-actions">
      <a href="https://wa.me" target="_blank" rel="noopener"
         style="display:inline-flex;align-items:center;justify-content:center;gap:0.5rem;background:rgba(37,211,102,0.12);border:1px solid rgba(37,211,102,0.3);border-radius:10px;padding:0.75rem;color:#22c55e;font-weight:600;font-size:0.9rem;text-decoration:none;">
        <i class="fa-brands fa-whatsapp"></i> Escribir por WhatsApp
      </a>
      <a href="./#contacto" class="btn-primary" style="justify-content:center; text-decoration: none;">
        Empezar mi proyecto →
      </a>
    </div>
  </div>
</header>

<main>
  <!-- ============================
       SECCIÓN CENTRAL RESPONSIVA
  ============================ -->
  <section class="error-404-section">
    <!-- Orbes de luz de fondo -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <div class="error-container">
      <div class="hero-badge">
        <span class="badge-dot"></span>
        Error del sistema · Nodo no encontrado
      </div>

      <h1 class="glitch-title">404</h1>
      <h2 class="error-subtitle">Enlace fuera de órbita</h2>
      
      <p class="error-desc">
        La página que estás intentando buscar no existe, ha sido movida de directorio o se encuentra temporalmente fuera de servicio en nuestro ecosistema.
      </p>

      <div class="error-actions">
        <a href="./" class="btn-primary" style="text-decoration: none;">
          Volver al Inicio <i class="fa-solid fa-house" style="margin-left: 0.5rem;"></i>
        </a>
        <button type="button" id="openSupportModal" class="btn-glass-support">
          Soporte Técnico <i class="fa-solid fa-headset"></i>
        </button>
      </div>
    </div>
  </section>

    <!-- ============================
       MODAL DE SOPORTE (ESTRUCTURA OPTIMIZADA)
  ============================ -->
  <div class="support-modal-overlay" id="supportModal">
    <div class="support-modal-card">
      <button type="button" class="support-modal-close" id="closeSupportModal" aria-label="Cerrar modal">&times;</button>
      
      <h3 class="modal-title">Centro de Soporte UNIT</h3>
      <p class="modal-desc">
        ¿Detectaste un fallo en el sistema o necesitas asistencia inmediata? Elige la plataforma de tu preferencia para ayudarte:
      </p>

      <div class="modal-options">
        <!-- Tarjeta Telegram -->
        <div class="modal-box-glass">
          <div class="box-icon icon-tg"><i class="fa-brands fa-telegram"></i></div>
          <h4>Comunidad Telegram</h4>
          <p>Coloca tu problema detectado directamente en nuestra comunidad de desarrollo en Telegram.</p>
          <a href="https://t.me/+7GO-lgXiOXJjMjIx" target="_blank" rel="noopener" class="btn-modal btn-tg" style="text-decoration: none;">
            Ir a Telegram <i class="fa-solid fa-users"></i>
          </a>
        </div>

        <!-- Tarjeta WhatsApp (Corregido a etiqueta <a> para máxima compatibilidad) -->
                <!-- Tarjeta WhatsApp (Enlace Directo Nativo - Sin JavaScript) -->
        <div class="modal-box-glass">
          <div class="box-icon icon-wa"><i class="fa-brands fa-whatsapp"></i></div>
          <h4>Soporte Directo</h4>
          <p>Contacta de manera privada a soporte técnico para dar seguimiento personalizado a tu caso.</p>
          <a href="https://wa.me/51906829934" target="_blank" rel="noopener" class="btn-modal btn-wa" style="text-decoration: none;">
            Contactar WhatsApp <i class="fa-solid fa-comment-dots"></i>
          </a>
        </div>

      </div>
    </div>
  </div>

</main>

<!-- Inclusión Script Principal -->
<script src="./assets/js/main.js"></script>
<script src="./assets/js/error404.js"></script>
</body>
</html>
