/* ============================
     SCRIPTS
============================ */
  /* ── Custom cursor (only on devices with precise pointer) ── */
  const hasPointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const cDot  = document.getElementById('cDot');
  const cRing = document.getElementById('cRing');
  const cGlow = document.getElementById('cGlow');

  if (hasPointer) {
    let mx=0, my=0, rx=0, ry=0, gx=0, gy=0;
    let visible = false;

    document.addEventListener('mousemove', e => {
      mx = e.clientX; my = e.clientY;
      if (!visible) {
        visible = true;
        cDot.style.display  = 'block';
        cRing.style.display = 'block';
        cGlow.style.display = 'block';
      }
    });

    document.addEventListener('mouseleave', () => {
      cDot.style.opacity  = '0';
      cRing.style.opacity = '0';
    });

    document.addEventListener('mouseenter', () => {
      cDot.style.opacity  = '1';
      cRing.style.opacity = '1';
    });

    document.addEventListener('mousedown', () => {
      document.body.classList.add('cursor-click');
    });

    document.addEventListener('mouseup', () => {
      document.body.classList.remove('cursor-click');
    });

    // Hover on interactive elements
    document.querySelectorAll('a, button, select, input, textarea, label').forEach(el => {
      el.addEventListener('mouseenter', () => document.body.classList.add('cursor-active'));
      el.addEventListener('mouseleave', () => document.body.classList.remove('cursor-active'));
    });

    (function animCursor() {
      cDot.style.left  = mx + 'px';
      cDot.style.top   = my + 'px';

      rx += (mx - rx) * 0.14;
      ry += (my - ry) * 0.14;
      cRing.style.left = rx + 'px';
      cRing.style.top  = ry + 'px';

      gx += (mx - gx) * 0.07;
      gy += (my - gy) * 0.07;
      cGlow.style.left = gx + 'px';
      cGlow.style.top  = gy + 'px';

      requestAnimationFrame(animCursor);
    })();
  }

  /* ── Logo → scroll to top ── */
  document.getElementById('logo-link').addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  /* ── Hamburger menu ── */
  const hamburger   = document.getElementById('hamburger');
  const mobileMenu  = document.getElementById('mobileMenu');

  hamburger.addEventListener('click', () => {
    const open = hamburger.classList.toggle('open');
    hamburger.setAttribute('aria-expanded', open);
    if (open) {
      mobileMenu.classList.add('open');
    } else {
      mobileMenu.classList.remove('open');
    }
  });

  // Close on link click
  document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('open');
      hamburger.setAttribute('aria-expanded', false);
      mobileMenu.classList.remove('open');
    });
  });

  // Close on outside click
  document.addEventListener('click', e => {
    if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
      hamburger.classList.remove('open');
      hamburger.setAttribute('aria-expanded', false);
      mobileMenu.classList.remove('open');
    }
  });

  /* ── Scroll reveal ── */
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        // Stagger siblings
        const siblings = entry.target.parentElement.querySelectorAll('.reveal');
        siblings.forEach((el, idx) => {
          if (el === entry.target) {
            setTimeout(() => {
              el.classList.add('visible');
            }, idx * 80);
          }
        });
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

  /* ── Active nav link on scroll ── */
  const sections = document.querySelectorAll('section[id], div[id="inicio"]');
  const navLinks = document.querySelectorAll('.nav-links a');

  const activeObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(a => a.style.color = '');
        const active = document.querySelector(`.nav-links a[href="#${entry.target.id}"]`);
        if (active) active.style.color = 'var(--text)';
      }
    });
  }, { rootMargin: '-40% 0px -55% 0px' });

  document.querySelectorAll('section[id]').forEach(s => activeObserver.observe(s));
(function () {
  var ANIM_MS = 420;
  var GAP_PX  = 20; /* 1.25rem */

  var track    = document.getElementById('pfTrack');
  var btnPrev  = document.getElementById('pfPrev');
  var btnNext  = document.getElementById('pfNext');
  var dotsWrap = document.getElementById('pfDots');
  var counter  = document.getElementById('pfCounter');
  if (!track) return;

  /* Estado */
  var allCards     = Array.from(track.querySelectorAll('.pf-card'));
  var visibleCards = allCards.slice();
  var currentPage  = 0;
  var perPage      = calcPerPage();
  var totalPages   = 1;
  var busy         = false;

  /* Cuántas cards se ven según viewport */
  function calcPerPage() {
    if (window.innerWidth <= 640)  return 1;
    if (window.innerWidth <= 1024) return 2;
    return 3;
  }

  /* Ancho de una card */
  function cardWidth() {
    var outer = track.parentElement.clientWidth;
    return (outer - GAP_PX * (perPage - 1)) / perPage;
  }

  /* Asigna anchos y recalcula páginas desplazamiento individual */
  function layout() {
    var w = cardWidth();
    visibleCards.forEach(function(c) {
      c.style.flexBasis = w + 'px';
      c.style.flexShrink = '0';
    });
    // Se ajusta el cálculo para scroll por elemento individual
    totalPages = Math.max(1, visibleCards.length - perPage + 1);
  }

  /* Mueve el track */
  function goTo(page, instant) {
    page = Math.max(0, Math.min(page, totalPages - 1));
    currentPage = page;

    if (instant) {
      track.style.transition = 'none';
      track.getBoundingClientRect(); /* flush */
    }

    // El desplazamiento calcula el offset por cada tarjeta
    var offset = page * (cardWidth() + GAP_PX);
    track.style.transform = 'translateX(-' + offset + 'px)';

    if (instant) {
      track.getBoundingClientRect();
      track.style.transition = '';
    }

    renderUI();
  }

  /* Actualiza dots / flechas / contador */
  function renderUI() {
    dotsWrap.innerHTML = '';
    for (var i = 0; i < totalPages; i++) {
      (function(idx) {
        var d = document.createElement('button');
        d.className = 'pf-dot' + (idx === currentPage ? ' active' : '');
        d.setAttribute('aria-label', 'Página ' + (idx + 1));
        d.addEventListener('click', function() { slide(idx); });
        dotsWrap.appendChild(d);
      })(i);
    }

    btnPrev.disabled = currentPage === 0;
    btnNext.disabled = currentPage >= totalPages - 1;

    var from = visibleCards.length === 0 ? 0 : currentPage + 1;
    var to   = Math.min(currentPage + perPage, visibleCards.length);
    counter.innerHTML = '<em>' + from + '–' + to + '</em> / ' + visibleCards.length;
  }

  function slide(page) {
    if (busy || page === currentPage) return;
    busy = true;
    goTo(page);
    setTimeout(function() { busy = false; }, ANIM_MS);
  }

  /* Reconstruye el track con un subconjunto de cards */
  function rebuild(cards) {
    track.innerHTML = '';
    track.style.transform = 'translateX(0)';
    currentPage = 0;
    visibleCards = cards;
    cards.forEach(function(c) { track.appendChild(c); });
    layout();
    goTo(0, true);
  }

  /* Filtros */
  document.querySelectorAll('.pf-tab').forEach(function(tab) {
    tab.addEventListener('click', function() {
      document.querySelectorAll('.pf-tab').forEach(function(t) { t.classList.remove('active'); });
      tab.classList.add('active');
      var f = tab.dataset.filter;
      var filtered = allCards.filter(function(c) {
        return f === 'all' || c.dataset.cat === f;
      });
      rebuild(filtered);
    });
  });

  /* Flechas */
  btnPrev.addEventListener('click', function() { slide(currentPage - 1); });
  btnNext.addEventListener('click', function() { slide(currentPage + 1); });

  /* Swipe táctil */
  var tx0 = 0;
  track.addEventListener('touchstart', function(e) { tx0 = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', function(e) {
    var dx = e.changedTouches[0].clientX - tx0;
    if (Math.abs(dx) > 48) { dx < 0 ? slide(currentPage + 1) : slide(currentPage - 1); }
  }, { passive: true });

  /* Resize */
  var resizeT;
  window.addEventListener('resize', function() {
    clearTimeout(resizeT);
    resizeT = setTimeout(function() {
      var np = calcPerPage();
      perPage = np;
      layout();
      if (currentPage >= totalPages) currentPage = totalPages - 1;
      goTo(currentPage, true);
    }, 120);
  });

  /* Init */
  layout();
  goTo(0, true);

})();

// Diccionario con las vistas UI completamente elaboradas y modernas
  const demoViews = {
    'voy-app': `<div class="demo-wrapper dynamic-fade">
                  <div class="voy-dashboard">
                    <div class="voy-header-status">
                      <span class="badge-live animate-pulse-green">● SISTEMA VOY EN VIVO</span>
                      <span style="color:#64748B; font-size:0.75rem;">Servidor: Huanta-01</span>
                    </div>
                    <div class="voy-map-widget">
                      <div class="map-grid-lines"></div>
                      <div class="map-vector-route"></div>
                      <div class="map-marker-car">
                        <i class="fa-solid fa-car"></i>
                        <div class="marker-pulse"></div>
                      </div>
                      <div class="map-pop-info">Ruta Óptima Calculada</div>
                    </div>
                    <div class="voy-metrics">
                      <div class="metric-pill"><span class="metric-label">Latencia API</span><span class="metric-value" style="color:#00E676;">14ms</span></div>
                      <div class="metric-pill"><span class="metric-label">Peticiones concurrentes</span><span class="metric-value">4,821/s</span></div>
                      <div class="metric-pill"><span class="metric-label">Uso de Base de Datos</span><span class="metric-value" style="color:#00B0FF;">24%</span></div>
                    </div>
                  </div>
                </div>`,
                
    'web-institucional': `<div class="demo-wrapper dynamic-fade">
                            <div class="portal-mockup">
                              <div class="portal-nav">
                                <span>Institución X</span>
                                <div style="display:flex; gap:10px; font-size:0.6rem; opacity:0.8;"><span>Inicio</span><span>Admisión</span><span>Contacto</span></div>
                              </div>
                              <div class="portal-hero">
                                <h4>Educación que Transforma</h4>
                                <p>Matrículas abiertas para el periodo académico 2026. Plataforma virtual integrada para alumnos.</p>
                                <span class="portal-btn">Postular Ahora <i class="fa-solid fa-paper-plane"></i></span>
                              </div>
                            </div>
                          </div>`,
                          
    'ux-dashboard': `<div class="demo-wrapper dynamic-fade">
                        <div class="ux-analytics-box">
                          <div style="font-size:0.75rem; color:#A855F7; font-weight:bold; margin-bottom:10px;"><i class="fa-solid fa-chart-pie"></i> RETENCIÓN Y FLUJO DE USUARIOS (UX)</div>
                          <div class="ux-chart-container">
                            <div class="ux-bar" style="height: 40%;"></div>
                            <div class="ux-bar" style="height: 65%;"></div>
                            <div class="ux-bar" style="height: 95%;"></div>
                            <div class="ux-bar" style="height: 55%;"></div>
                            <div class="ux-bar" style="height: 85%;"></div>
                            <div class="ux-bar" style="height: 70%;"></div>
                          </div>
                          <div style="display:flex; justify-content:space-between; font-size:0.7rem; color:#64748B;">
                            <span>Optimización de Interfaz</span>
                            <span style="color:#E040FB; font-weight:bold;">+38% Conversión</span>
                          </div>
                        </div>
                      </div>`
  };

  // Función controladora del intercambio de pantallas en la laptop
  function changeDeviceDemo(viewKey) {
    // 1. Quitar estado activo de los botones de pestañas anteriores
    const tabs = document.querySelectorAll('.device-tab');
    tabs.forEach(t => t.classList.remove('active'));
    
    // 2. Activar la pestaña seleccionada mediante el evento nativo
    event.currentTarget.classList.add('active');
    
    // 3. Renderizar la vista gráfica moderna correspondiente al 100% del contenedor
    document.getElementById('deviceCanvas').innerHTML = demoViews[viewKey];
  }

  document.addEventListener("DOMContentLoaded", () => {
  const fName = document.getElementById("fname");
  const fPhone = document.getElementById("fphone");
  const fEmail = document.getElementById("femail");
  const fService = document.getElementById("fservice");
  const fMsg = document.getElementById("fmsg");
  
  const btnSubmit = document.querySelector(".form-submit") || document.getElementById("btnSubmit");
  const glassModal = document.getElementById("glassModal");
  const btnCloseModal = document.getElementById("btnCloseModal");
  const btnWhatsappSend = document.getElementById("btnWhatsappSend");

  // Restricción en tiempo real para WhatsApp (9 dígitos, empieza con 9)
  if (fPhone) {
    fPhone.addEventListener("input", (e) => {
      let value = e.target.value.replace(/\D/g, "");
      if (value.length > 0 && value[0] !== '9') {
        value = "";
      }
      e.target.value = value.substring(0, 9);
    });
  }

  // --- Funciones de Error (Sin alterar el fondo del selector) ---
  const aplicarErrorGlass = (elemento) => {
    elemento.dataset.originalBorder = elemento.style.border;
    elemento.dataset.originalBoxShadow = elemento.style.boxShadow;

    // Solo afectamos el borde externo y el resplandor para no alterar el fondo ni las letras del select
    elemento.style.setProperty("border", "1px solid rgba(255, 76, 76, 0.7)", "important");
    elemento.style.setProperty("box-shadow", "0 0 12px rgba(255, 76, 76, 0.4)", "important");
  };

  const removerErrorGlass = (elemento) => {
    if (elemento) {
      elemento.style.border = elemento.dataset.originalBorder || "";
      elemento.style.boxShadow = elemento.dataset.originalBoxShadow || "";
    }
  };

  // --- ESCUCHADORES INMEDIATOS PARA CADA CAMPO ---
  // Se activan al escribir (input) o cambiar de opción (change) garantizando la limpieza del error
  if (fName) fName.addEventListener("input", () => removerErrorGlass(fName));
  if (fPhone) fPhone.addEventListener("input", () => removerErrorGlass(fPhone));
  if (fEmail) fEmail.addEventListener("input", () => removerErrorGlass(fEmail));
  
  // El selector se limpia inmediatamente al escoger una opción válida
  if (fService) {
    fService.addEventListener("change", () => {
      if (fService.value !== "") removerErrorGlass(fService);
    });
  }

  // --- Validación de Envío ---
  if (btnSubmit) {
    btnSubmit.addEventListener("click", (e) => {
      e.preventDefault();
      let isValid = true;

      if (fName && fName.value.trim() === "") {
        aplicarErrorGlass(fName);
        isValid = false;
      }

      if (fPhone) {
        const phoneValue = fPhone.value.trim();
        if (phoneValue.length !== 9 || !phoneValue.startsWith("9")) {
          aplicarErrorGlass(fPhone);
          isValid = false;
        }
      }

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (fEmail && !emailRegex.test(fEmail.value.trim())) {
        aplicarErrorGlass(fEmail);
        isValid = false;
      }

      if (fService && fService.value === "") {
        aplicarErrorGlass(fService);
        isValid = false;
      }

      if (isValid && glassModal) {
        glassModal.classList.add("active");
      }
    });
  }

  // --- Control del Modal ---
  if (btnCloseModal && glassModal) {
    btnCloseModal.addEventListener("click", () => glassModal.classList.remove("active"));
    glassModal.addEventListener("click", (e) => {
      if (e.target === glassModal) glassModal.classList.remove("active");
    });
  }

  // --- Redirección Final a WhatsApp ---
  if (btnWhatsappSend) {
    btnWhatsappSend.addEventListener("click", () => {
      const nombre = fName ? fName.value.trim() : "";
      const telefono = fPhone ? fPhone.value.trim() : "";
      const correo = fEmail ? fEmail.value.trim() : "";
      const servicio = fService ? fService.value : "";
      const mensajeAdicional = fMsg && fMsg.value.trim() ? fMsg.value.trim() : "Sin comentarios adicionales.";

      const titulo = "📌Nuevo Proyecto Unit!🧑🏻‍💻";
      const textoWhatsApp = `*${titulo}*%0A%0A` +
                            `👤 *Nombre:* ${nombre}%0A` +
                            `📱 *WhatsApp:* ${telefono}%0A` +
                            `📧 *Correo:* ${correo}%0A` +
                            `💼 *Servicio:* ${servicio}%0A` +
                            `📝 *Detalles:* ${mensajeAdicional}`;

      const numeroDestino = "51906829934"; 
      const url = `https://api.whatsapp.com/send?phone=${numeroDestino}&text=${textoWhatsApp}`;
      
      window.open(url, "_blank");
      glassModal.classList.remove("active");
    });
  }
});
