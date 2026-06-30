<style>
    
    /* ── PORTFOLIO ── */
.portfolio-section {
  padding: 5.5rem 3rem;
  background: var(--bg);
  border-top: 1px solid var(--border);
  position: relative;
  overflow: hidden;
}

.portfolio-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(124,58,237,0.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(124,58,237,0.03) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
  mask-image: radial-gradient(ellipse 90% 70% at 50% 40%, black, transparent);
  -webkit-mask-image: radial-gradient(ellipse 90% 70% at 50% 40%, black, transparent);
}

.portfolio-inner {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

/* Header */
.portfolio-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 1.5rem;
  margin-bottom: 0.75rem;
  flex-wrap: wrap;
}

.portfolio-header .section-title { margin-bottom: 0; }

/* Filter tabs */
.portfolio-filters {
  display: flex;
  gap: 0.4rem;
  flex-wrap: wrap;
  align-items: center;
}

.pf-tab {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  padding: 0.38rem 0.85rem;
  border-radius: 8px;
  font-size: 0.78rem;
  font-weight: 600;
  border: 1px solid var(--border);
  background: transparent;
  color: var(--muted);
  font-family: 'Inter', sans-serif;
  transition: all 0.2s;
  white-space: nowrap;
}

.pf-tab:hover {
  border-color: rgba(168,85,247,0.4);
  color: var(--text);
  background: rgba(124,58,237,0.08);
}

.pf-tab.active {
  background: rgba(124,58,237,0.15);
  border-color: rgba(168,85,247,0.45);
  color: var(--purple-glow);
}

.portfolio-subtitle {
  color: var(--muted);
  font-size: 0.92rem;
  line-height: 1.7;
  max-width: 560px;
  margin-bottom: 2rem;
}

/* ── Slider ── */
.pf-slider-wrap { position: relative; }

.pf-track-outer {
  overflow: hidden;
  border-radius: 16px;
}

.pf-track {
  display: flex;
  gap: 1.25rem;
  transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: transform;
}

/* ── Card ── */
.pf-card {
  flex-shrink: 0;
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
}

.pf-card:hover {
  border-color: rgba(124,58,237,0.5);
  transform: translateY(-4px);
  box-shadow: 0 20px 50px rgba(0,0,0,0.4), 0 0 0 1px rgba(124,58,237,0.18);
}

/* Thumbnail */
.pf-thumb {
  position: relative;
  overflow: hidden;
  aspect-ratio: 16 / 10;
  background: var(--surface2);
  flex-shrink: 0;
}

.pf-screenshot {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: top center;
  display: block;
  transition: transform 0.5s ease;
}

.pf-card:hover .pf-screenshot { transform: scale(1.04); }

/* Placeholder */
.pf-thumb-placeholder {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0.65rem;
  background: var(--surface2);
  border-bottom: 1px dashed var(--border);
}

.pf-thumb-placeholder i { font-size: 2rem; color: rgba(168,85,247,0.25); }
.pf-thumb-placeholder span { font-size: 0.7rem; color: var(--muted); font-family: monospace; }

/* Overlay */
.pf-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(8,8,15,0.94) 0%, rgba(8,8,15,0.25) 65%, transparent 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 1.1rem 1.2rem;
  z-index: 2;
}

.pf-card:hover .pf-overlay { opacity: 1; }

@media (hover: none) {
  .pf-overlay { opacity: 1; }
}

.pf-overlay-desc {
  color: rgba(241,240,255,0.78);
  font-size: 0.78rem;
  line-height: 1.55;
}

/* Status badge */
.pf-status {
  position: absolute;
  top: 0.75rem;
  right: 0.75rem;
  z-index: 3;
  display: inline-flex;
  align-items: center;
  gap: 0.3rem;
  font-size: 0.63rem;
  font-weight: 700;
  padding: 0.2rem 0.55rem;
  border-radius: 20px;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.pf-status-dot {
  width: 5px; height: 5px;
  border-radius: 50%;
  background: currentColor;
  animation: pulse 2s infinite;
}

.pf-status--soon { background: rgba(124,58,237,0.82); color: #e9d5ff; border: 1px solid rgba(168,85,247,0.5); }
.pf-status--live { background: rgba(34,197,94,0.82);  color: #dcfce7; border: 1px solid rgba(34,197,94,0.5); }
.pf-status--wip  { background: rgba(251,146,60,0.82); color: #ffedd5; border: 1px solid rgba(251,146,60,0.5); }

/* Info bar */
.pf-info {
  padding: 0.85rem 1rem;
  border-top: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.5rem;
  flex-shrink: 0;
  background: var(--surface);
}

.pf-info-left {
  display: flex;
  flex-direction: column;
  gap: 0.15rem;
  min-width: 0;
  flex: 1;
}

.pf-info-name {
  font-family: 'Sora', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--text);
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.pf-info-type { color: var(--muted); font-size: 0.67rem; }

.pf-info-right { display: flex; align-items: center; gap: 0.45rem; flex-shrink: 0; }

.pf-info-stack { display: flex; gap: 0.3rem; }

.pf-stack-pill {
  font-size: 0.6rem;
  color: var(--muted);
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--border);
  border-radius: 4px;
  padding: 0.1rem 0.38rem;
  white-space: nowrap;
}

.pf-link-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 30px; height: 30px;
  border-radius: 8px;
  border: 1px solid var(--border);
  color: var(--muted);
  font-size: 0.72rem;
  flex-shrink: 0;
  transition: background 0.2s, border-color 0.2s, color 0.2s;
}

.pf-link-btn:hover {
  background: rgba(124,58,237,0.15);
  border-color: rgba(168,85,247,0.4);
  color: var(--purple-glow);
}

/* ── Controles ── */
.pf-controls {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1rem;
  margin-top: 1.5rem;
}

.pf-dots { display: flex; gap: 0.4rem; align-items: center; }

.pf-dot {
  width: 6px; height: 6px;
  border-radius: 3px;
  background: var(--border);
  border: none; padding: 0;
  flex-shrink: 0;
  transition: background 0.25s, width 0.25s;
}

.pf-dot.active { background: var(--purple-light); width: 20px; }

.pf-arrow {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px; height: 36px;
  border-radius: 10px;
  border: 1px solid var(--border);
  background: var(--surface);
  color: var(--muted);
  font-size: 0.8rem;
  transition: background 0.2s, border-color 0.2s, color 0.2s;
  flex-shrink: 0;
}

.pf-arrow:hover:not(:disabled) {
  background: rgba(124,58,237,0.15);
  border-color: rgba(168,85,247,0.4);
  color: var(--purple-glow);
}

.pf-arrow:disabled { opacity: 0.3; pointer-events: none; }

.pf-counter { font-size: 0.74rem; color: var(--muted); min-width: 56px; text-align: center; }
.pf-counter em { color: var(--purple-light); font-style: normal; font-weight: 600; }

/* ── CTA strip ── */
.portfolio-cta-strip {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  background: var(--surface2);
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 1.5rem 2rem;
  margin-top: 2rem;
  flex-wrap: wrap;
}

.pf-cta-text h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.05rem;
  font-weight: 700;
  margin-bottom: 0.2rem;
}

.pf-cta-text p { color: var(--muted); font-size: 0.85rem; }

.pf-cta-actions { display: flex; gap: 0.65rem; flex-wrap: wrap; align-items: center; }

.pf-wh-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  background: rgba(37,211,102,0.1);
  border: 1px solid rgba(37,211,102,0.3);
  border-radius: 10px;
  padding: 0.7rem 1.2rem;
  color: var(--wh-green);
  font-weight: 600;
  font-size: 0.88rem;
  font-family: 'Inter', sans-serif;
  transition: background 0.2s;
  white-space: nowrap;
}

.pf-wh-btn:hover { background: rgba(37,211,102,0.18); }

/* ── Responsive ── */
@media (max-width: 1024px) {
  .portfolio-section { padding: 4.5rem 1.75rem; }
  .portfolio-header { flex-direction: column; align-items: flex-start; gap: 1rem; }
  .portfolio-filters { justify-content: flex-start; }
}

@media (max-width: 640px) {
  .portfolio-section { padding: 3.5rem 1.25rem; }
  .portfolio-cta-strip { flex-direction: column; }
  .pf-cta-actions { width: 100%; flex-direction: column; }
  .pf-cta-actions .btn-primary,
  .pf-cta-actions .pf-wh-btn { width: 100%; justify-content: center; }
}
</style>


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
        <button class="pf-tab" data-filter="bot">
          <i class="fa-brands fa-whatsapp fa-xs"></i> Bots
        </button>
        <button class="pf-tab" data-filter="ecommerce">
          <i class="fa-solid fa-bag-shopping fa-xs"></i> Tiendas
        </button>
      </div>
    </div>

    <p class="portfolio-subtitle">
      Cada proyecto tiene su propia marca e identidad — todo desarrollado íntegramente por E404.
    </p>

    <div class="pf-slider-wrap">
      <div class="pf-track-outer">
        <div class="pf-track" id="pfTrack">

          <div class="pf-card" data-cat="sistema">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Panel de gestión empresarial"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/gestion-pro.jpg</span>
              </div>
              <div class="pf-status pf-status--soon">
                <span class="pf-status-dot"></span> Próximamente
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Administración de clientes, inventario, facturación y reportes en tiempo real para pymes.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">GestiónPro</span>
                <span class="pf-info-type">Sistema SaaS · CRM</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">PHP</span>
                  <span class="pf-stack-pill">MySQL</span>
                  <span class="pf-stack-pill">Vue</span>
                </div>
                <a href="#contacto" class="pf-link-btn" title="Quiero algo similar">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="bot">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Bot de ventas WhatsApp"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/vende-mas-bot.jpg</span>
              </div>
              <div class="pf-status pf-status--wip">
                <span class="pf-status-dot"></span> En desarrollo
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Toma pedidos, gestiona pagos y notifica al equipo automáticamente sin intervención humana.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">VendeMás Bot</span>
                <span class="pf-info-type">Bot WhatsApp · IA</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">Node.js</span>
                  <span class="pf-stack-pill">OpenAI</span>
                </div>
                <a href="#contacto" class="pf-link-btn">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="web">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Plataforma de reservas"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/reserva-facil.jpg</span>
              </div>
              <div class="pf-status pf-status--soon">
                <span class="pf-status-dot"></span> Próximamente
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Sistema de agendamiento online con pagos integrados y notificaciones automáticas.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">ReservaFácil</span>
                <span class="pf-info-type">Plataforma web · Reservas</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">PHP</span>
                  <span class="pf-stack-pill">Stripe</span>
                </div>
                <a href="#contacto" class="pf-link-btn">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="ecommerce">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Tienda online de moda"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/style-store.jpg</span>
              </div>
              <div class="pf-status pf-status--wip">
                <span class="pf-status-dot"></span> En desarrollo
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">E-commerce completo con panel admin, gestión de stock y pagos con Culqi y Yape.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">StyleStore</span>
                <span class="pf-info-type">E-commerce · Moda</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">PHP</span>
                  <span class="pf-stack-pill">Culqi</span>
                  <span class="pf-stack-pill">MySQL</span>
                </div>
                <a href="#contacto" class="pf-link-btn">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="web">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Landing de alta conversión"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/convierte-ya.jpg</span>
              </div>
              <div class="pf-status pf-status--soon">
                <span class="pf-status-dot"></span> Próximamente
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Landing de captación para campaña publicitaria con formularios conectados a CRM.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">ConvierteYa</span>
                <span class="pf-info-type">Landing · Marketing</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">HTML</span>
                  <span class="pf-stack-pill">PHP</span>
                  <span class="pf-stack-pill">Meta Ads</span>
                </div>
                <a href="#contacto" class="pf-link-btn">
                  <i class="fa-solid fa-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="pf-card" data-cat="sistema">
            <div class="pf-thumb">
              <img class="pf-screenshot"
                   src="./assets/img/SanAlfonso.png"
                   alt="Proyecto 6"
                   loading="lazy"
                   onerror="this.style.display='none';this.nextElementSibling.style.display='flex';" />
              <div class="pf-thumb-placeholder" style="display:none;">
                <i class="fa-solid fa-image"></i>
                <span>img/portfolio/proyecto-6.jpg</span>
              </div>
              <div class="pf-status pf-status--live">
                <span class="pf-status-dot"></span> En vivo
              </div>
              <div class="pf-overlay">
                <div class="pf-overlay-desc">Actualiza este texto con la descripción real del proyecto.</div>
              </div>
            </div>
            <div class="pf-info">
              <div class="pf-info-left">
                <span class="pf-info-name">Proyecto 6</span>
                <span class="pf-info-type">Sistema · Backend</span>
              </div>
              <div class="pf-info-right">
                <div class="pf-info-stack">
                  <span class="pf-stack-pill">PHP</span>
                  <span class="pf-stack-pill">MySQL</span>
                </div>
                <a href="#" target="_blank" rel="noopener" class="pf-link-btn" title="Ver proyecto">
                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
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


<script>
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
</script>