<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO -->
  <title>UNIT | Desarrollo de Software, Sistemas Web y Soluciones Digitales en Perú</title>

  <meta name="description"
    content="En UNIT desarrollamos software a medida, páginas web profesionales, sistemas empresariales, plataformas digitales, e-commerce y soluciones tecnológicas que impulsan el crecimiento de tu negocio." />

  <meta name="robots"
    content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />

  <meta name="author" content="UNIT - Soluciones Digitales Inteligentes" />
  <meta name="copyright" content="UNIT 2026" />
  <meta name="theme-color" content="#0B1220" />
  <meta name="format-detection" content="telephone=no" />

  <link rel="canonical" href="https://unit.pe/" />

  <!-- Iconos -->
  <link rel="icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />
  <link rel="shortcut icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />

  <!-- Open Graph (Facebook, WhatsApp, Telegram, LinkedIn, Discord, Messenger, etc.) -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://unit.pe/" />
  <meta property="og:site_name" content="UNIT" />
  <meta property="og:locale" content="es_PE" />

  <meta property="og:title"
    content="UNIT | Desarrollo de Software y Soluciones Digitales" />

  <meta property="og:description"
    content="Creamos software a medida, páginas web profesionales, sistemas empresariales y plataformas digitales para potenciar tu empresa." />

  <meta property="og:image"
    content="https://unit.pe/assets/img/og-preview.jpg" />

  <meta property="og:image:secure_url"
    content="https://unit.pe/assets/img/og-preview.jpg" />

  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:image:type" content="image/jpeg" />

  <meta property="og:image:alt"
    content="UNIT - Desarrollo de Software y Soluciones Digitales" />

  <!-- Twitter / X -->
  <meta name="twitter:card" content="summary_large_image" />

  <meta name="twitter:title"
    content="UNIT | Desarrollo de Software y Soluciones Digitales" />

  <meta name="twitter:description"
    content="Software a medida, páginas web profesionales y sistemas digitales para empresas." />

  <meta name="twitter:image"
    content="https://unit.pe/assets/img/og-preview.jpg" />
    
  <meta name="twitter:image:alt"
    content="UNIT - Desarrollo de Software" />

  <!-- Rendimiento -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Sora:wght@700;800&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <link rel="stylesheet" href="./assets/css/style.css" />

  <!-- Datos estructurados para Google -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "UNIT",
    "url": "https://unit.pe",
    "logo": "https://unit.pe/assets/img/icon/ICONO1.png",
    "image": "https://unit.pe/assets/img/og-preview.jpg",
    "description": "Empresa especializada en desarrollo de software, páginas web, sistemas empresariales y soluciones digitales en Perú."
  }
  </script>

</head>
<body>

<!-- Custom Cursor (desktop only) -->
<div class="cursor-glow"  id="cGlow"></div>
<div class="cursor-ring"  id="cRing"></div>
<div class="cursor-dot"   id="cDot"></div>

<!-- ============================
     NAVBAR
============================ -->
<header>
  <nav class="navbar">
    <a href="#inicio" class="logo" id="logo-link">
      <img src="./assets/img/icon/LogoUnitNew-01.webp" alt="UNIT" class="logo-img" />
    </a>

    <ul class="nav-links">
      <li><a href="#servicios">Servicios</a></li>
      <li><a href="#ecosistema-digital">Ecosistema</a></li>
      <li><a href="#portafolio">Portafolio</a></li>
      <li><a href="#proceso">Proceso</a></li>
      <li><a href="#contacto">Contacto</a></li>
    </ul>

    <div class="nav-right">
      <a class="nav-whatsapp" href="https://wa.me/51906829934" target="_blank" rel="noopener">
        <i class="fa-brands fa-whatsapp"></i>
        <span class="wh-label">WhatsApp</span>
      </a>
      <button class="nav-cta" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
        Empezar proyecto →
      </button>
      <button class="nav-hamburger" id="hamburger" aria-label="Menú" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </nav>

  <!-- Mobile drawer -->
  <div class="mobile-menu" id="mobileMenu" role="navigation">
    <a href="#servicios" class="mobile-nav-link">Servicios</a>
    <a href="#ecosistema-digital" class="mobile-nav-link">Ecosistema</a>
    <a href="#portafolio" class="mobile-nav-link">Portafolio</a>
    <a href="#proceso" class="mobile-nav-link">Proceso</a>
    <a href="#contacto" class="mobile-nav-link">Contacto</a>
    <div class="mobile-menu-actions">
      <a href="https://wa.me/51906829934" target="_blank" rel="noopener"
         style="display:inline-flex;align-items:center;justify-content:center;gap:0.5rem;background:rgba(37,211,102,0.12);border:1px solid rgba(37,211,102,0.3);border-radius:10px;padding:0.75rem;color:#22c55e;font-weight:600;font-size:0.9rem;">
        <i class="fa-brands fa-whatsapp"></i> Escribir por WhatsApp
      </a>
      <button class="btn-primary" style="justify-content:center;" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'});document.getElementById('mobileMenu').classList.remove('open');document.getElementById('hamburger').classList.remove('open');">
        Empezar mi proyecto →
      </button>
    </div>
  </div>
</header>

<main>

  <!-- ============================
       HERO
  ============================ -->
  <section class="hero" id="inicio">
  <div class="orb orb-1"></div>
  <div class="orb orb-2"></div>
  <div class="orb orb-3"></div>

  <div class="hero-left">
    <div class="hero-badge">
      <span class="badge-dot"></span>
      Desarrollo · Marketing · Automatización de Procesos
    </div>

    <h1>
      Construimos tu<br />
      presencia <span class="hl">digital</span><br />
      que <span class="hl2">convierte</span>
    </h1>

    <p class="hero-sub">
      Desarrollamos páginas web, sistemas a medida y automatizaciones que optimizan tu empresa y eliminan tareas repetitivas.

    </p>

    <div class="hero-actions">
      <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
        Quiero optimizar mi empresa <i class="fa-solid fa-arrow-right"></i>
      </button>
      <button class="btn-secondary" onclick="document.getElementById('servicios').scrollIntoView({behavior:'smooth'})">
        Ver soluciones
      </button>
    </div>

    <div class="hero-trust">
      <div class="trust-avatars">
        <span>ME</span><span>UN</span><span>SA</span><span>IH</span>
      </div>
      <div class="trust-text">
        <strong>+30 empresas</strong> optimizan sus operaciones con nosotros
      </div>
    </div>
  </div>

  <div class="hero-right">
    <div class="hero-3d-scene">
      <div class="orbit-ring orbit-ring-3"></div>
      <div class="orbit-ring orbit-ring-2"></div>
      <div class="orbit-ring orbit-ring-1">
        <div class="orbit-dot"></div>
      </div>

      <div class="cube-wrapper">
        <div class="cube">
          <div class="cube-face face-front"><i class="fa-solid fa-network-wired"></i></div>
          <div class="cube-face face-back"><i class="fa-solid fa-database"></i></div>
          <div class="cube-face face-left"><i class="fa-solid fa-gears"></i></div>
          <div class="cube-face face-right"><i class="fa-solid fa-chart-pie"></i></div>
          <div class="cube-face face-top"><i class="fa-solid fa-code"></i></div>
          <div class="cube-face face-bottom"><i class="fa-solid fa-bolt"></i></div>
        </div>
      </div>

      <div class="scene-platform"></div>

      <div class="float-card float-card-1">
        <div class="fc-dot"></div> Procesos Automatizados
      </div>
      <div class="float-card float-card-2">
        <div class="fc-dot"></div> Reducción de Tiempos · Errores 0%
      </div>
      <div class="float-card float-card-3">
        <div class="fc-dot"></div> Sistemas 100% a Medida
      </div>
    </div>
  </div>
</section>

  <!-- ============================
       STATS
  ============================ -->
  <div class="stats-strip" aria-label="Estadísticas">
    <div class="stat-item">
      <div class="stat-num">+<em>80</em></div>
      <div class="stat-lbl">Proyectos entregados</div>
    </div>
    <div class="stat-divider" aria-hidden="true"></div>
    <div class="stat-item">
      <div class="stat-num"><em>7</em> días</div>
      <div class="stat-lbl">Tiempo promedio de entrega</div>
    </div>
    <div class="stat-divider" aria-hidden="true"></div>
    <div class="stat-item">
      <div class="stat-num"><em>100</em>%</div>
      <div class="stat-lbl">Satisfacción garantizada</div>
    </div>
    <div class="stat-divider" aria-hidden="true"></div>
    <div class="stat-item">
      <div class="stat-num"><em>24</em>/7</div>
      <div class="stat-lbl">Soporte activo</div>
    </div>
  </div>

  <!-- ============================
       SERVICES
  ============================ -->
  <section class="section-wrap" id="servicios">
    <div class="section-label">Lo que hacemos</div>
    <h2 class="section-title">Todo lo digital<br />en un solo lugar</h2>
    <p class="section-sub">Desde una landing page hasta un sistema complejo. Construimos exactamente lo que tu negocio necesita.</p>

    <div class="cards-grid">
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-globe"></i></div>
        <h3>Páginas web profesionales</h3>
        <p>Landing pages, sitios corporativos y portafolios con diseño moderno, carga ultrarrápida y optimizados para convertir visitantes en clientes.</p>
        <span class="card-tag">Diseño · Frontend · SEO</span>
      </div>
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-laptop-code"></i></div>
        <h3>Sistemas a medida</h3>
        <p>Plataformas, dashboards, CRMs y sistemas internos adaptados exactamente a tu flujo de trabajo y necesidades de negocio.</p>
        <span class="card-tag">Backend · Bases de datos</span>
      </div>
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-compass-drafting"></i></div>
        <h3>Diseño UI / UX</h3>
        <p>Creamos interfaces modernas, intuitivas y atractivas. Rediseñamos la imagen digital de tu negocio para conectar mejor con tus usuarios.</p>
        <span class="card-tag">Figma · Prototipado · UI</span>
      </div>
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-chart-line"></i></div>
        <h3>Marketing digital</h3>
        <p>Estrategias de redes sociales, publicidad pagada y posicionamiento SEO que atraen clientes reales y miden resultados.</p>
        <span class="card-tag">SEO · Ads · Social media</span>
      </div>
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-cart-shopping"></i></div>
        <h3>Tiendas en línea</h3>
        <p>E-commerce completo con pasarela de pagos, gestión de inventario, panel administrativo y experiencia de compra fluida.</p>
        <span class="card-tag">E-commerce · Pagos</span>
      </div>
      <div class="card reveal">
        <div class="card-icon"><i class="fa-solid fa-network-wired"></i></div>
        <h3>Integraciones y APIs</h3>
        <p>Conectamos tus herramientas existentes: ERP, CRM, pasarelas de pago, redes sociales y servicios externos.</p>
        <span class="card-tag">API · Integración</span>
      </div>
    </div>
  </section>

  <section class="bots-section" id="ecosistema-digital">
  <div class="bots-inner">
    
    <!-- LADO IZQUIERDO: TEXTO DESCRIPTIVO -->
    <div>
      <div class="section-label">Plataformas Inteligentes</div>
      <h2 class="section-title">Software a medida<br />con diseño de alta fidelidad</h2>
      <p style="color:var(--muted); line-height:1.75; margin-bottom:1.5rem; font-size:1rem;">
        Desarrollamos soluciones digitales robustas que combinan una arquitectura de datos impecable con interfaces fluidas. Explora las demos interactivas de nuestros ecosistemas en tiempo real.
      </p>

      <div class="bots-features">
        <div class="bot-feature">
          <div class="bot-feature-icon" style="background: rgba(0, 230, 118, 0.1); color: #00E676;"><i class="fa-solid fa-layer-group"></i></div>
          <span><strong>Sistemas y Apps:</strong> Monitoreo en tiempo real, geolocalización y flujos automatizados optimizados.</span>
        </div>
        <div class="bot-feature">
          <div class="bot-feature-icon" style="background: rgba(0, 176, 255, 0.1); color: #00B0FF;"><i class="fa-solid fa-display"></i></div>
          <span><strong>Portales Web:</strong> Sitios institucionales veloces, adaptables y con carga optimizada.</span>
        </div>
        <div class="bot-feature">
          <div class="bot-feature-icon" style="background: rgba(224, 64, 251, 0.1); color: #E040FB;"><i class="fa-solid fa-palette"></i></div>
          <span><strong>Diseño UI/UX:</strong> Experiencias visuales interactivas pensadas en la retención del usuario.</span>
        </div>
      </div>

      <div style="margin-top:2rem;">
        <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
          Cotizar mi Proyecto <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>
    </div>

    <!-- LADO DERECHO: PANTALLA PREMIUM INTERACTIVA (100% GRÁFICA) -->
    <div class="bots-right">
      <div class="device-mockup">
        
        <!-- Barra superior del Dispositivo -->
        <div class="device-header">
          <div class="device-dots">
            <span class="dot-r"></span>
            <span class="dot-y"></span>
            <span class="dot-g"></span>
          </div>
          <div class="device-search-bar"><i class="fa-solid fa-lock" style="font-size:0.7rem; color:#00E676;"></i> unit.pe/demo-live</div>
        </div>
        
        <!-- Selector de Aplicaciones (Pestañas Modernas) -->
        <div class="device-nav-tabs">
          <button class="device-tab active" onclick="changeDeviceDemo('voy-app')">
            <i class="fa-solid fa-car-side"></i> Sistema a medida
          </button>
          <button class="device-tab" onclick="changeDeviceDemo('web-institucional')">
            <i class="fa-solid fa-graduation-cap"></i> Portal Web
          </button>
          <button class="device-tab" onclick="changeDeviceDemo('ux-dashboard')">
            <i class="fa-solid fa-chart-line"></i> UX Análisis
          </button>
        </div>
        
        <!-- Contenedor del Render Gráfico Principal (100% de la pantalla) -->
        <div class="device-screen-content" id="deviceCanvas">
          
          <!-- DEMO 1: SISTEMA VOY (Por defecto) -->
          <div class="demo-wrapper dynamic-fade">
            <div class="voy-dashboard">
              <div class="voy-header-status">
                <span class="badge-live animate-pulse-green">● SISTEMA VOY EN VIVO</span>
                <span style="color:#64748B; font-size:0.75rem;">Servidor: Huanta-01</span>
              </div>
              
              <!-- Mapa Interactivo Simulado -->
              <div class="voy-map-widget">
                <div class="map-grid-lines"></div>
                <div class="map-vector-route"></div>
                <!-- Nodo del vehículo simulado -->
                <div class="map-marker-car">
                  <i class="fa-solid fa-car"></i>
                  <div class="marker-pulse"></div>
                </div>
                <div class="map-pop-info">Ruta Óptima Calculada</div>
              </div>

              <!-- Indicadores de Rendimiento -->
              <div class="voy-metrics">
                <div class="metric-pill">
                  <span class="metric-label">Latencia API</span>
                  <span class="metric-value" style="color:#00E676;">14ms</span>
                </div>
                <div class="metric-pill">
                  <span class="metric-label">Peticiones concurrentes</span>
                  <span class="metric-value">4,821/s</span>
                </div>
                <div class="metric-pill">
                  <span class="metric-label">Uso de Base de Datos</span>
                  <span class="metric-value" style="color:#00B0FF;">24%</span>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Resplandor de fondo de la pantalla -->
      <div class="device-glow"></div>
    </div>

  </div>
</section>

  <section class="portfolio-section" id="portafolio">
  <div class="portfolio-inner">

    <div class="portfolio-header">
      <div>
        <div class="section-label">Portafolio</div>
        <h2 class="section-title">Lo que construimos</h2>
      </div>
      <div class="portfolio-filters">
        <button class="pf-tab active" data-filter="all">Todos</button>
        <button class="pf-tab" data-filter="sistema">
          <i class="fa-solid fa-server fa-xs"></i> Sistemas
        </button>
        <button class="pf-tab" data-filter="web">
          <i class="fa-solid fa-globe fa-xs"></i> Web
        </button>
        <!--<button class="pf-tab" data-filter="bot">
          <i class="fa-brands fa-whatsapp fa-xs"></i> Bots
        </button>
        <button class="pf-tab" data-filter="ecommerce">
          <i class="fa-solid fa-bag-shopping fa-xs"></i> Tiendas
        </button>-->
      </div>
    </div>

    <p class="portfolio-subtitle">
      Cada proyecto tiene su propia marca e identidad, todo desarrollado íntegramente por UNIT.
    </p>

    <div class="pf-slider-wrap">
      <div class="pf-track-outer">
        <div class="pf-track" id="pfTrack">

          <div class="pf-card" data-cat="sistema">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/portfolio/SanAlfonso.png"
                   alt="VOY - Plataforma de Movilidad Urbana"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>Voy.jpg</span>
              </div>
              <div class="pf-status pf-status--soon">
                <span class="pf-status-dot"></span> Próximamente
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Aplicación móvil web de transporte urbano en tiempo real. Conexión inteligente entre pasajeros y conductores, optimización de rutas y gestión segura.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">VOY</span>
                <span class="pf-info-type">Sistema · Movilidad - Transporte</span>
              </div>
              <div class="pf-info-right">
                <a href="#" class="pf-link-btn" title="Ver">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="#contacto" class="pf-link-btn" title="Quiero algo similar">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="web">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/portfolio/SanAlfonso.png"
                   alt="Plataforma escolar"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>SanAlfonso.jpg</span>
              </div>
              <div class="pf-status pf-status--live">
                <span class="pf-status-dot"></span> Activo
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Sitio web institucional diseñado para la difusión de la propuesta educativa, información del proceso de admisión, galería de eventos y canales oficiales de atención para la comunidad escolar.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">San Alfonso - Huanta</span>
                <span class="pf-info-type">Sitio web · Institucional</span>
              </div>
              <div class="pf-info-right">
                <a href="https://sanalfonsohuanta.edu.pe/" class="pf-link-btn" title="Ver">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="#contacto" class="pf-link-btn" title="Quiero algo similar">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="web">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/portfolio/IESHuanta.png"
                   alt="Landing de alta conversión"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>IESHuanta.jpg</span>
              </div>
              <div class="pf-status pf-status--live">
                <span class="pf-status-dot"></span> Activo
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Portal web institucional desarrollado para la presentación de carreras profesionales técnicas, información del examen de admisión, transparencia y canales de atención digital.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">I.E.S. Huanta</span>
                <span class="pf-info-type">Sitio web · Institucional</span>
              </div>
              <div class="pf-info-right">
                <a href="https://iestphuanta.edu.pe/" class="pf-link-btn" title="Ver">
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a href="#contacto" class="pf-link-btn" title="Quiero algo similar">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

        </div></div><div class="pf-controls">
        <button class="pf-arrow" id="pfPrev" aria-label="Anterior">
          <i class="fa-solid fa-chevron-left"></i>
        </button>
        <div class="pf-dots" id="pfDots"></div>
        <button class="pf-arrow" id="pfNext" aria-label="Siguiente">
          <i class="fa-solid fa-chevron-right"></i>
        </button>
        <span class="pf-counter" id="pfCounter"></span>
      </div>
    </div><div class="portfolio-cta-strip">
      <div class="pf-cta-text">
        <h3>¿Tienes un proyecto en mente?</h3>
        <p>Construimos el sistema, web o bot que necesitas — con tu marca o la nuestra.</p>
      </div>
      <div class="pf-cta-actions">
        <button class="btn-primary"
                onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
          Hablemos de tu proyecto <i class="fa-solid fa-arrow-right"></i>
        </button>
        <a class="pf-wh-btn"
           href="https://wa.me/51906829934?text=Hola,%20vi%20su%20portafolio%20y%20quiero%20algo%20similar"
           target="_blank" rel="noopener">
          <i class="fa-brands fa-whatsapp"></i> WhatsApp directo
        </a>
      </div>
    </div>

  </div>
</section>

  <!-- ============================
       PROCESS
  ============================ -->
  <section class="process-section" id="proceso">
    <div class="process-header">
      <div class="section-label">Cómo trabajamos</div>
      <h2 class="section-title">Del concepto al lanzamiento<br />en 4 pasos</h2>
      <p style="color:var(--muted);font-size:0.95rem;line-height:1.72;margin-top:0.75rem;">
        Sin burocracia ni sorpresas. Un proceso claro donde tú ves el avance en cada etapa.
      </p>
    </div>

    <div class="process-grid">
      <div class="process-connector" aria-hidden="true"></div>
      <div class="process-card reveal">
        <div class="process-num">1</div>
        <h4>Escuchamos tu idea</h4>
        <p>Reunión para entender tu negocio, objetivos y qué solución tiene más sentido para ti.</p>
      </div>
      <div class="process-card reveal">
        <div class="process-num">2</div>
        <h4>Diseñamos la propuesta</h4>
        <p>Presentamos el alcance, tiempos y costo antes de empezar. Sin compromisos ocultos.</p>
      </div>
      <div class="process-card reveal">
        <div class="process-num">3</div>
        <h4>Desarrollamos contigo</h4>
        <p>Te mostramos avances frecuentes para que puedas dar tu feedback en cada etapa.</p>
      </div>
      <div class="process-card reveal">
        <div class="process-num">4</div>
        <h4>Lanzamos y te acompañamos</h4>
        <p>Publicamos tu proyecto y quedamos para soporte, ajustes y crecimiento futuro.</p>
      </div>
    </div>
  </section>

  <!-- ============================
       CONTACT
  ============================ -->
  <section class="contact-section" id="contacto">
    <div class="contact-inner">

      <div class="contact-left">
        <div class="section-label">Contacto</div>
        <h2>¿Listo para tu<br />proyecto digital?</h2>
        <p>
          Cuéntanos qué necesitas y te respondemos en menos de 2 horas.
          Preferimos el WhatsApp — es más directo y rápido para arrancar.
        </p>

        <a class="wh-cta-big" href="https://wa.me/51906829934?text=Hola,%20quiero%20info%20sobre%20sus%20servicios" target="_blank" rel="noopener">
          <div class="wh-cta-icon"><i class="fa-brands fa-whatsapp" style="font-size:1.5rem;"></i></div>
          <div class="wh-cta-text">
            <div class="wh-cta-title">Escríbenos por WhatsApp</div>
            <div class="wh-cta-sub">Respuesta inmediata · Lunes a Domingo</div>
          </div>
          <div class="wh-cta-arrow"><i class="fa-solid fa-arrow-right"></i></div>
        </a>

        <p style="color:var(--muted);font-size:0.8rem;margin-bottom:0.85rem;">O encuéntranos en nuestras redes:</p>

        <div class="social-row">
          <a target="_blank" class="social-btn ig" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-instagram"></i> Instagram
          </a>
          <a target="_blank" class="social-btn fb" href="https://www.facebook.com/UNITPERU" target="_blank" rel="noopener">
            <i class="fa-brands fa-facebook"></i> Facebook
          </a>
          <a target="_blank" class="social-btn tk" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-tiktok"></i> TikTok
          </a>
          <a target="_blank" class="social-btn li" href="https://t.me/+7GO-lgXiOXJjMjIx" target="_blank" rel="noopener">
            <i class="fa-brands fa-telegram"></i> Telegram
          </a>
        </div>

        <div class="contact-info-box">
          <p><i class="fa-solid fa-location-dot" style="color:var(--purple-light);margin-right:0.4rem;"></i> Atendemos a todo Perú y Latinoamérica</p>
          <p>Trabajamos 100% remoto. Nos adaptamos a tu zona horaria.</p>
        </div>
      </div>

      <div class="contact-right">
  <h3>Cuéntanos tu proyecto</h3>

  <div class="form-row">
    <div class="form-group">
      <label class="form-label" for="fname">Nombre</label>
      <input class="form-input" id="fname" type="text" placeholder="Tu nombre" autocomplete="given-name" />
    </div>
    <div class="form-group">
      <label class="form-label" for="fphone">WhatsApp</label>
      <input class="form-input" id="fphone" type="tel" maxlength="9" placeholder="999 999 999" autocomplete="tel" />
    </div>
  </div>

  <div class="form-group">
    <div class="label-container">
      <label class="form-label" for="femail">Correo electrónico</label>
    </div>
    <input class="form-input" id="femail" type="email" placeholder="tu@correo.com" autocomplete="email" />
  </div>

  <div class="form-group">
    <label class="form-label" for="fservice">¿Qué necesitas?</label>
    <select class="form-select" id="fservice">
      <option value="" disabled selected>Selecciona un servicio</option>
      <option value="Página web">Página web</option>
      <option value="Sistema o plataforma">Sistema o plataforma</option>
      <option value="Marketing digital">Marketing digital</option>
      <option value="Tienda en línea">Tienda en línea</option>
      <option value="Otro">Otro</option>
    </select>
  </div>

  <div class="form-group">
    <label class="form-label" for="fmsg">Cuéntanos más (opcional)</label>
    <textarea class="form-textarea" id="fmsg" placeholder="Describe brevemente tu proyecto o idea..."></textarea>
  </div>

  <button class="form-submit" type="button" id="btnSubmit">
    Enviar mensaje <i class="fa-solid fa-paper-plane"></i>
  </button>
</div>

<!-- Modal Glassmorphism Profesional -->
<div class="glass-modal-overlay" id="glassModal">
  <div class="glass-modal-content">
    <button class="glass-modal-close" id="btnCloseModal" aria-label="Cerrar modal">&times;</button>
    <h4>Enviar mensaje</h4>
    <p class="glass-modal-text">
      Para brindarte una atención personalizada, procesaremos los detalles de tu requerimiento directamente a través de nuestro canal institucional.
    </p>
    <button class="btn-whatsapp-send" id="btnWhatsappSend">
      <i class="fa-brands fa-whatsapp"></i> WhatsApp
    </button>
  </div>
</div>

    </div>
  </section>

</main>

<!-- ============================
     FOOTER
============================ -->
<footer class="footer">
  <div class="footer-top">
    <div class="footer-brand">
      <a href="#inicio">
    <img src="./assets/img/icon/LogoUnitNew-01.webp" alt="UNIT" style="height:44px;width:auto;display:block;" />
</a>
      <p>Agencia digital especializada en desarrollo web, sistemas, automatización y marketing. Transformamos ideas en soluciones digitales que generan resultados reales.</p>
      <div class="footer-social">
        <a target="_blank" href="#" title="Instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a target="_blank" href="https://www.facebook.com/UNITPERU" title="Facebook" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
        <a target="_blank" href="#" title="TikTok" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        <a target="_blank" href="https://t.me/+7GO-lgXiOXJjMjIx" title="Telegram" aria-label="Telegram"><i class="fa-brands fa-telegram"></i></a>
        <a href="https://wa.me/51906829934" target="_blank" title="WhatsApp" aria-label="WhatsApp" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Servicios</h4>
      <ul>
        <li><a href="#servicios">Páginas web</a></li>
        <li><a href="#servicios">Sistemas a medida</a></li>
        <li><a href="#bots">Bots de WhatsApp</a></li>
        <li><a href="#servicios">Marketing digital</a></li>
        <li><a href="#servicios">Tiendas en línea</a></li>
        <li><a href="#servicios">Integraciones API</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Empresa</h4>
      <ul>
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#proceso">Cómo trabajamos</a></li>
        <li><a href="#contacto">Contacto</a></li>
        <li><a href="#portafolio">Portafolio</a></li>
        <li><a href="https://t.me/+7GO-lgXiOXJjMjIx">Comunidad</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Contacto directo</h4>
      <ul>
        <li>
          <a href="https://wa.me/51906829934" target="_blank" rel="noopener">
            <i class="fa-brands fa-whatsapp" style="color:var(--wh-green);"></i> +51 906 829 934
          </a>
        </li>
        <li>
          <a href="mailto:contacto@unit.pe">
            <i class="fa-solid fa-envelope" style="color:var(--purple-light);"></i> contacto@unit.pe
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa-solid fa-location-dot" style="color:var(--muted);"></i> Perú · Remoto
          </a>
        </li>
      </ul>
      <a href="https://wa.me/51906829934?text=Hola,%20quiero%20info%20sobre%20sus%20servicios"
         target="_blank" rel="noopener" class="footer-wh-btn">
        <i class="fa-brands fa-whatsapp"></i> Escribir ahora
      </a>
    </div>
  </div>

  <div class="footer-bottom">
    <p class="footer-copy">© 2026 UNIT — Todos los derechos reservados</p>
    <div class="footer-badge">
      <span class="badge-dot" style="width:5px;height:5px;flex-shrink:0;"></span>
      Disponibles para nuevos proyectos
    </div>
    <p class="footer-copy">Hecho con 💜 en Perú</p>
  </div>
</footer>

<script src="./assets/js/main.js"></script>
</body>
</html>