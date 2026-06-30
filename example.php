<!--
  ╔══════════════════════════════════════════════════════════════╗
  ║  SECCIÓN PORTAFOLIO — E404                                  ║
  ║  Pega el bloque <style> dentro de tu <style> existente      ║
  ║  Pega el <section> en tu <main>                             ║
  ║  Pega el <script> antes del cierre </body>                  ║
  ╚══════════════════════════════════════════════════════════════╝
-->


<!-- ═══════════════════════════════════════
     CSS — añadir dentro del <style> existente
════════════════════════════════════════════ -->
<style>
/* ── PORTFOLIO ── */
.portfolio-section {
  padding: 6rem 3rem;
  background: var(--bg);
  border-top: 1px solid var(--border);
  overflow: hidden;
  position: relative;
}

/* Fondo decorativo de cuadrícula */
.portfolio-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(124,58,237,0.035) 1px, transparent 1px),
    linear-gradient(90deg, rgba(124,58,237,0.035) 1px, transparent 1px);
  background-size: 48px 48px;
  pointer-events: none;
  mask-image: radial-gradient(ellipse 80% 60% at 50% 50%, black, transparent);
}

.portfolio-inner {
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
  z-index: 1;
}

/* Header row */
.portfolio-top {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 2rem;
  margin-bottom: 1rem;
  flex-wrap: wrap;
}

.portfolio-count-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--purple-glow);
  margin-bottom: 0.6rem;
}

.portfolio-count-badge::before {
  content: '';
  display: block;
  width: 20px;
  height: 1px;
  background: var(--purple-light);
  opacity: 0.6;
}

.portfolio-top-left .section-title { margin-bottom: 0; }

.portfolio-top-right {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 1rem;
  flex-shrink: 0;
}

/* Filter tabs */
.portfolio-filters {
  display: flex;
  gap: 0.45rem;
  flex-wrap: wrap;
  justify-content: flex-end;
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

.pf-tab .pf-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: currentColor;
  opacity: 0.7;
}

/* Subtitle line */
.portfolio-subtitle {
  color: var(--muted);
  font-size: 0.92rem;
  line-height: 1.7;
  max-width: 480px;
  margin-bottom: 3rem;
}

/* ── GRID ── */
.portfolio-grid {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-auto-rows: 280px;
  gap: 1.25rem;
  margin-bottom: 1.5rem;
}

/* Card base */
.pf-card {
  position: relative;
  border-radius: 18px;
  border: 1px solid var(--border);
  overflow: hidden;
  background: var(--surface);
  transition: border-color 0.35s, transform 0.35s, box-shadow 0.35s;
  display: flex;
  flex-direction: column;
}

.pf-card:hover {
  border-color: rgba(124,58,237,0.5);
  transform: translateY(-4px);
  box-shadow: 0 24px 60px rgba(0,0,0,0.4), 0 0 0 1px rgba(124,58,237,0.2);
}

/* Layout bento */
.pf-card--wide   { grid-column: span 7; }
.pf-card--narrow { grid-column: span 5; }
.pf-card--third  { grid-column: span 4; }
.pf-card--half   { grid-column: span 6; }

/* Thumbnail area */
.pf-thumb {
  flex: 1;
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.pf-image{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
    transition:.5s;
}

.pf-card:hover .pf-image{
    transform:scale(1.05);
}

/* Gradientes únicos por proyecto */
.pf-thumb--purple  { background: linear-gradient(135deg, #0d0618 0%, #1a0b35 40%, #2d1060 100%); }
.pf-thumb--blue    { background: linear-gradient(135deg, #030d1a 0%, #071c38 40%, #0c3260 100%); }
.pf-thumb--teal    { background: linear-gradient(135deg, #030f0d 0%, #071e1a 40%, #0d3530 100%); }
.pf-thumb--orange  { background: linear-gradient(135deg, #120800 0%, #251500 40%, #3d2200 100%); }
.pf-thumb--rose    { background: linear-gradient(135deg, #130008 0%, #270010 40%, #400020 100%); }

/* Inner mock UI */
.pf-mock {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1.5rem;
  transition: transform 0.5s ease;
}

.pf-card:hover .pf-mock { transform: scale(1.04); }

/* Mock: dashboard */
.mock-dashboard {
  width: 100%;
  max-width: 340px;
}

.mock-topbar {
  height: 28px;
  background: rgba(255,255,255,0.05);
  border-radius: 8px 8px 0 0;
  border: 1px solid rgba(255,255,255,0.08);
  display: flex;
  align-items: center;
  padding: 0 10px;
  gap: 5px;
}

.mock-dot {
  width: 7px; height: 7px;
  border-radius: 50%;
}

.mock-body {
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.07);
  border-top: none;
  border-radius: 0 0 8px 8px;
  padding: 10px;
  display: flex;
  gap: 8px;
}

.mock-sidebar {
  width: 52px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.mock-sb-item {
  height: 24px;
  border-radius: 5px;
  background: rgba(255,255,255,0.07);
}

.mock-sb-item.active { background: rgba(124,58,237,0.45); }

.mock-content { flex: 1; display: flex; flex-direction: column; gap: 7px; }

.mock-card-row { display: flex; gap: 6px; }

.mock-mini-card {
  flex: 1;
  height: 44px;
  border-radius: 6px;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.55rem;
  color: rgba(255,255,255,0.35);
}

.mock-chart-area {
  height: 60px;
  border-radius: 6px;
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.07);
  overflow: hidden;
  position: relative;
  display: flex;
  align-items: flex-end;
  gap: 3px;
  padding: 6px 8px 0;
}

.mock-bar {
  flex: 1;
  border-radius: 3px 3px 0 0;
  background: rgba(124,58,237,0.4);
}

.mock-bar.hi { background: rgba(168,85,247,0.75); }

/* Mock: website */
.mock-browser {
  width: 100%;
  max-width: 300px;
}

.mock-browser-bar {
  height: 24px;
  background: rgba(255,255,255,0.06);
  border: 1px solid rgba(255,255,255,0.09);
  border-radius: 7px 7px 0 0;
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 0 8px;
}

.mock-browser-dots { display: flex; gap: 4px; }
.mock-browser-dot  { width: 6px; height: 6px; border-radius: 50%; }

.mock-url-bar {
  flex: 1;
  height: 12px;
  border-radius: 3px;
  background: rgba(255,255,255,0.08);
  margin-left: 6px;
}

.mock-page {
  background: rgba(255,255,255,0.03);
  border: 1px solid rgba(255,255,255,0.07);
  border-top: none;
  border-radius: 0 0 7px 7px;
  padding: 10px;
}

.mock-hero-banner {
  height: 56px;
  border-radius: 6px;
  margin-bottom: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  overflow: hidden;
  position: relative;
}

.mock-hero-text {
  display: flex;
  flex-direction: column;
  gap: 4px;
  z-index: 1;
}

.mock-line {
  height: 5px;
  border-radius: 3px;
  background: rgba(255,255,255,0.25);
}

.mock-cards-row {
  display: flex;
  gap: 6px;
}

.mock-page-card {
  flex: 1;
  height: 34px;
  border-radius: 5px;
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.08);
}

/* Mock: chat/bot */
.mock-chat {
  width: 100%;
  max-width: 220px;
  background: rgba(7,30,26,0.8);
  border: 1px solid rgba(255,255,255,0.1);
  border-radius: 14px;
  overflow: hidden;
}

.mock-chat-header {
  background: #075e54;
  padding: 8px 12px;
  display: flex;
  align-items: center;
  gap: 7px;
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

.mock-chat-avatar {
  width: 22px; height: 22px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 0.6rem;
}

.mock-chat-name { font-size: 0.62rem; font-weight: 600; color: #fff; }
.mock-chat-status { font-size: 0.52rem; color: rgba(255,255,255,0.55); }

.mock-chat-body {
  padding: 8px;
  display: flex;
  flex-direction: column;
  gap: 5px;
}

.mock-bubble {
  font-size: 0.53rem;
  line-height: 1.4;
  padding: 5px 8px;
  border-radius: 10px;
  max-width: 88%;
  color: rgba(255,255,255,0.85);
}

.mock-bubble.in  { background: rgba(255,255,255,0.1); align-self: flex-start; border-bottom-left-radius: 2px; }
.mock-bubble.out { background: #128c7e; align-self: flex-end; border-bottom-right-radius: 2px; }

/* Mock: ecommerce */
.mock-shop {
  width: 100%;
  max-width: 260px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.mock-shop-header {
  height: 24px;
  background: rgba(255,255,255,0.05);
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 10px;
}

.mock-shop-logo {
  font-size: 0.55rem;
  font-weight: 700;
  color: rgba(255,255,255,0.6);
  font-family: 'Sora', sans-serif;
}

.mock-shop-icons { display: flex; gap: 5px; }
.mock-shop-icon  { width: 10px; height: 10px; border-radius: 2px; background: rgba(255,255,255,0.12); }

.mock-products {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 6px;
}

.mock-product-card {
  border-radius: 7px;
  overflow: hidden;
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.07);
}

.mock-product-img {
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
}

.mock-product-info {
  padding: 4px 5px;
}

.mock-product-line {
  height: 4px;
  border-radius: 2px;
  background: rgba(255,255,255,0.12);
  margin-bottom: 3px;
}

.mock-product-price {
  height: 4px;
  width: 50%;
  border-radius: 2px;
  background: rgba(236,72,153,0.5);
}

/* Mock: landing minimal */
.mock-landing {
  width: 100%;
  max-width: 200px;
  display: flex;
  flex-direction: column;
  gap: 7px;
}

.mock-landing-nav {
  height: 18px;
  background: rgba(255,255,255,0.04);
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 8px;
}

.mock-nav-logo  { width: 28px; height: 4px; border-radius: 2px; background: rgba(255,165,0,0.5); }
.mock-nav-links { display: flex; gap: 4px; }
.mock-nav-link  { width: 18px; height: 3px; border-radius: 2px; background: rgba(255,255,255,0.15); }

.mock-landing-hero {
  height: 58px;
  border-radius: 7px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 5px;
  padding: 8px;
}

.mock-h-line { height: 5px; border-radius: 3px; background: rgba(255,255,255,0.25); }
.mock-h-sub  { height: 3px; border-radius: 2px; background: rgba(255,255,255,0.12); width: 70%; }
.mock-h-btn  { height: 12px; width: 50px; border-radius: 4px; }

/* Overlay info on hover */
.pf-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(8,8,15,0.96) 0%, rgba(8,8,15,0.4) 55%, transparent 100%);
  opacity: 0;
  transition: opacity 0.35s ease;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 1.5rem;
  z-index: 2;
}

.pf-card:hover .pf-overlay { opacity: 1; }

.pf-overlay-tags { display: flex; gap: 0.4rem; flex-wrap: wrap; margin-bottom: 0.6rem; }

.pf-overlay-tag {
  font-size: 0.68rem;
  font-weight: 600;
  padding: 0.18rem 0.55rem;
  border-radius: 20px;
  background: rgba(124,58,237,0.3);
  border: 1px solid rgba(168,85,247,0.4);
  color: var(--purple-glow);
}

.pf-overlay-title {
  font-family: 'Sora', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 0.3rem;
}

.pf-overlay-desc {
  color: rgba(241,240,255,0.65);
  font-size: 0.78rem;
  line-height: 1.55;
}

/* Status badge */
.pf-status {
  position: absolute;
  top: 1rem;
  right: 1rem;
  z-index: 3;
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  font-size: 0.68rem;
  font-weight: 700;
  padding: 0.22rem 0.65rem;
  border-radius: 20px;
  backdrop-filter: blur(8px);
  letter-spacing: 0.04em;
}

.pf-status--soon    { background: rgba(124,58,237,0.75); color: #e9d5ff; border: 1px solid rgba(168,85,247,0.5); }
.pf-status--live    { background: rgba(34,197,94,0.75);  color: #dcfce7; border: 1px solid rgba(34,197,94,0.5); }
.pf-status--wip     { background: rgba(251,146,60,0.75); color: #ffedd5; border: 1px solid rgba(251,146,60,0.5); }
.pf-status-dot      { width: 5px; height: 5px; border-radius: 50%; background: currentColor; animation: pulse 2s infinite; }

/* Bottom info bar */
.pf-info {
  padding: 1rem 1.25rem;
  border-top: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 0.75rem;
  flex-shrink: 0;
  background: var(--surface);
}

.pf-info-left { display: flex; flex-direction: column; gap: 0.2rem; }

.pf-info-name {
  font-family: 'Sora', sans-serif;
  font-size: 0.88rem;
  font-weight: 700;
  color: var(--text);
  line-height: 1.2;
}

.pf-info-type { color: var(--muted); font-size: 0.72rem; }

.pf-info-stack { display: flex; gap: 0.35rem; flex-wrap: wrap; }

.pf-stack-pill {
  font-size: 0.65rem;
  color: var(--muted);
  background: rgba(255,255,255,0.04);
  border: 1px solid var(--border);
  border-radius: 4px;
  padding: 0.12rem 0.45rem;
}

.pf-link-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 34px;
  height: 34px;
  border-radius: 9px;
  border: 1px solid var(--border);
  color: var(--muted);
  font-size: 0.8rem;
  transition: background 0.2s, border-color 0.2s, color 0.2s;
  flex-shrink: 0;
}

.pf-link-btn:hover { background: rgba(124,58,237,0.15); border-color: rgba(168,85,247,0.4); color: var(--purple-glow); }

/* Second row */
.portfolio-row2 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.25rem;
  margin-bottom: 3rem;
}

/* CTA strip */
.portfolio-cta-strip {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  background: var(--surface2);
  border: 1px solid var(--border);
  border-radius: 18px;
  padding: 1.75rem 2.5rem;
  flex-wrap: wrap;
}

.pf-cta-text h3 {
  font-family: 'Sora', sans-serif;
  font-size: 1.15rem;
  font-weight: 700;
  margin-bottom: 0.3rem;
}

.pf-cta-text p { color: var(--muted); font-size: 0.88rem; }

.pf-cta-actions { display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap; }

.pf-wh-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.45rem;
  background: rgba(37,211,102,0.1);
  border: 1px solid rgba(37,211,102,0.3);
  border-radius: 10px;
  padding: 0.7rem 1.3rem;
  color: var(--wh-green);
  font-weight: 600;
  font-size: 0.88rem;
  font-family: 'Inter', sans-serif;
  transition: background 0.2s;
}

.pf-wh-btn:hover { background: rgba(37,211,102,0.18); }

/* Responsive */
@media (max-width: 1024px) {
  .portfolio-section { padding: 4.5rem 1.75rem; }
  .pf-card--wide   { grid-column: span 12; }
  .pf-card--narrow { grid-column: span 12; }
  .portfolio-grid  { grid-template-columns: 1fr 1fr; grid-auto-rows: 260px; display: grid; }
  .pf-card--wide,
  .pf-card--narrow { grid-column: span 1; }
  .portfolio-row2  { grid-template-columns: 1fr 1fr; }
  .portfolio-top   { flex-direction: column; align-items: flex-start; }
  .portfolio-top-right { align-items: flex-start; }
  .portfolio-filters { justify-content: flex-start; }
}

@media (max-width: 768px) {
  .portfolio-section { padding: 3.5rem 1.25rem; }
  .portfolio-grid     { grid-template-columns: 1fr; grid-auto-rows: 240px; }
  .portfolio-row2     { grid-template-columns: 1fr; }
  .portfolio-cta-strip { padding: 1.5rem; }
  .pf-overlay { opacity: 1; } /* always visible on touch */
}

@media (max-width: 480px) {
  .portfolio-cta-strip { flex-direction: column; align-items: flex-start; }
  .pf-cta-actions { width: 100%; flex-direction: column; }
  .pf-cta-actions .btn-primary,
  .pf-cta-actions .pf-wh-btn { width: 100%; justify-content: center; }
}
</style>


<!-- ═══════════════════════════════════════
     HTML — pegar dentro de <main>
════════════════════════════════════════════ -->
<section class="portfolio-section" id="portafolio">
  <div class="portfolio-inner">

    <!-- Header -->
    <div class="portfolio-top">
      <div class="portfolio-top-left">
        <div class="portfolio-count-badge">Portafolio · 5 proyectos</div>
        <h2 class="section-title">Lo que construimos</h2>
      </div>
      <div class="portfolio-top-right">
        <div class="portfolio-filters">
          <button class="pf-tab active" data-filter="all">
            <span class="pf-dot"></span> Todos
          </button>
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
            <i class="fa-solid fa-bag-shopping fa-xs"></i> E-commerce
          </button>
        </div>
      </div>
    </div>

    <p class="portfolio-subtitle">
      Cada proyecto es desarrollado íntegramente por E404 — con su propia identidad y marca. Esto es lo que somos capaces de construir.
    </p>

    <!-- Bento grid — fila 1 -->
    <div class="portfolio-grid" id="portfolioGrid">

      <!-- Card 1 — Dashboard SaaS (WIDE) -->
      <div class="pf-card pf-card--wide reveal" data-cat="sistema">
        <div class="pf-thumb pf-thumb--purple">
          <img
        src="img/portfolio/gestionpro.webp"
        alt="Sistema GestiónPro"
        class="pf-image">
          <div class="pf-status pf-status--soon"><span class="pf-status-dot"></span> Próximamente</div>
          <div class="pf-overlay">
            <div class="pf-overlay-tags">
              <span class="pf-overlay-tag"><i class="fa-solid fa-server fa-xs"></i> Sistema SaaS</span>
              <span class="pf-overlay-tag">CRM</span>
              <span class="pf-overlay-tag">Dashboard</span>
            </div>
            <div class="pf-overlay-title">Panel de gestión empresarial</div>
            <div class="pf-overlay-desc">Administración de clientes, inventario, facturación y reportes en tiempo real para pymes peruanas.</div>
          </div>
        </div>
        <div class="pf-info">
          <div class="pf-info-left">
            <span class="pf-info-name">GestiónPro</span>
            <span class="pf-info-type">Sistema de administración · SaaS</span>
          </div>
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <div class="pf-info-stack">
              <span class="pf-stack-pill">PHP</span>
              <span class="pf-stack-pill">MySQL</span>
              <span class="pf-stack-pill">Vue.js</span>
            </div>
            <a href="#contacto" class="pf-link-btn" title="Ver más"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 2 — Bot WhatsApp (NARROW) -->
      <div class="pf-card pf-card--narrow reveal" data-cat="bot">
        <div class="pf-thumb pf-thumb--teal">
          <img
        src="img/portfolio/gestionpro.webp"
        alt="Sistema GestiónPro"
        class="pf-image">
          <div class="pf-status pf-status--wip"><span class="pf-status-dot"></span> En desarrollo</div>
          <div class="pf-overlay">
            <div class="pf-overlay-tags">
              <span class="pf-overlay-tag"><i class="fa-brands fa-whatsapp fa-xs"></i> Bot</span>
              <span class="pf-overlay-tag">IA</span>
              <span class="pf-overlay-tag">Ventas</span>
            </div>
            <div class="pf-overlay-title">Bot de ventas automatizado</div>
            <div class="pf-overlay-desc">Toma pedidos, gestiona pagos y notifica al equipo — sin intervención humana.</div>
          </div>
        </div>
        <div class="pf-info">
          <div class="pf-info-left">
            <span class="pf-info-name">VendeMás Bot</span>
            <span class="pf-info-type">Bot WhatsApp · IA</span>
          </div>
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <div class="pf-info-stack">
              <span class="pf-stack-pill">Node.js</span>
              <span class="pf-stack-pill">OpenAI</span>
            </div>
            <a href="#contacto" class="pf-link-btn"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div><!-- /portfolio-grid -->

    <!-- Fila 2 — 3 columnas -->
    <div class="portfolio-row2" id="portfolioRow2">

      <!-- Card 3 — Web corporativa -->
      <div class="pf-card reveal" data-cat="web">
        <div class="pf-thumb pf-thumb--blue" style="flex:1;">
          <img
        src="img/portfolio/gestionpro.webp"
        alt="Sistema GestiónPro"
        class="pf-image">
          <div class="pf-status pf-status--soon"><span class="pf-status-dot"></span> Próximamente</div>
          <div class="pf-overlay">
            <div class="pf-overlay-tags">
              <span class="pf-overlay-tag"><i class="fa-solid fa-globe fa-xs"></i> Web</span>
              <span class="pf-overlay-tag">Corporativo</span>
            </div>
            <div class="pf-overlay-title">Sitio corporativo con reservas</div>
            <div class="pf-overlay-desc">Web profesional con sistema de agendamiento integrado y pasarela de pagos.</div>
          </div>
        </div>
        <div class="pf-info">
          <div class="pf-info-left">
            <span class="pf-info-name">ReservaFácil</span>
            <span class="pf-info-type">Plataforma web</span>
          </div>
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <div class="pf-info-stack">
              <span class="pf-stack-pill">PHP</span>
              <span class="pf-stack-pill">JS</span>
              <span class="pf-stack-pill">Stripe</span>
            </div>
            <a href="#contacto" class="pf-link-btn"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 4 — E-commerce -->
      <div class="pf-card reveal" data-cat="ecommerce">
        <div class="pf-thumb pf-thumb--rose" style="flex:1;">
          <img
        src="img/portfolio/gestionpro.webp"
        alt="Sistema GestiónPro"
        class="pf-image">
          <div class="pf-status pf-status--wip"><span class="pf-status-dot"></span> En desarrollo</div>
          <div class="pf-overlay">
            <div class="pf-overlay-tags">
              <span class="pf-overlay-tag"><i class="fa-solid fa-bag-shopping fa-xs"></i> E-commerce</span>
              <span class="pf-overlay-tag">Moda</span>
            </div>
            <div class="pf-overlay-title">Tienda de moda online</div>
            <div class="pf-overlay-desc">E-commerce completo con panel admin, gestión de stock y pagos con Culqi y Yape.</div>
          </div>
        </div>
        <div class="pf-info">
          <div class="pf-info-left">
            <span class="pf-info-name">StyleStore</span>
            <span class="pf-info-type">E-commerce · Moda</span>
          </div>
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <div class="pf-info-stack">
              <span class="pf-stack-pill">PHP</span>
              <span class="pf-stack-pill">Culqi</span>
              <span class="pf-stack-pill">MySQL</span>
            </div>
            <a href="#contacto" class="pf-link-btn"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Card 5 — Landing marketing -->
      <div class="pf-card reveal" data-cat="web">
        <div class="pf-thumb pf-thumb--orange" style="flex:1;">
          <img
        src="img/portfolio/gestionpro.webp"
        alt="Sistema GestiónPro"
        class="pf-image">
          <div class="pf-status pf-status--soon"><span class="pf-status-dot"></span> Próximamente</div>
          <div class="pf-overlay">
            <div class="pf-overlay-tags">
              <span class="pf-overlay-tag"><i class="fa-solid fa-bullhorn fa-xs"></i> Marketing</span>
              <span class="pf-overlay-tag">Landing</span>
            </div>
            <div class="pf-overlay-title">Landing de alta conversión</div>
            <div class="pf-overlay-desc">Página de captación para campaña publicitaria con A/B testing y formularios conectados a CRM.</div>
          </div>
        </div>
        <div class="pf-info">
          <div class="pf-info-left">
            <span class="pf-info-name">ConvierteYa</span>
            <span class="pf-info-type">Landing · Marketing digital</span>
          </div>
          <div style="display:flex;align-items:center;gap:0.75rem;">
            <div class="pf-info-stack">
              <span class="pf-stack-pill">HTML</span>
              <span class="pf-stack-pill">PHP</span>
              <span class="pf-stack-pill">Meta Ads</span>
            </div>
            <a href="#contacto" class="pf-link-btn"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>

    </div><!-- /portfolio-row2 -->

    <!-- CTA strip -->
    <div class="portfolio-cta-strip reveal">
      <div class="pf-cta-text">
        <h3>¿Tienes un proyecto en mente?</h3>
        <p>Construimos el sistema, web o bot que necesitas — con tu marca o la nuestra.</p>
      </div>
      <div class="pf-cta-actions">
        <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
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


<!-- ═══════════════════════════════════════
     JS — pegar antes del cierre </body>
     (o añadir dentro del <script> existente)
════════════════════════════════════════════ -->
<script>
(function() {
  /* ── Portfolio filter ── */
  const tabs     = document.querySelectorAll('.pf-tab');
  const cards1   = document.querySelectorAll('#portfolioGrid  .pf-card');
  const cards2   = document.querySelectorAll('#portfolioRow2  .pf-card');
  const allCards = [...cards1, ...cards2];

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const filter = tab.dataset.filter;

      allCards.forEach(card => {
        const match = filter === 'all' || card.dataset.cat === filter;
        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        if (match) {
          card.style.opacity  = '1';
          card.style.transform = '';
          card.style.pointerEvents = '';
        } else {
          card.style.opacity  = '0.2';
          card.style.transform = 'scale(0.97)';
          card.style.pointerEvents = 'none';
        }
      });
    });
  });
})();
</script>