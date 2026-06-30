<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UNIT - Impulsamos tu Negocio</title>
  <meta name="description" content="En UNIT desarrollamos soluciones digitales robustas: sistemas a medida, portales web institucionales y diseño UI/UX de alta fidelidad. Impulsa tu ecosistema digital aquí." />
  <meta name="keywords" content="unit, software a medida, desarrollo web, sistemas web, ui ux, paginas web peru, huanta, marketing digital, ecommerce" />
  <meta name="robots" content="index, follow" />
  <meta name="author" content="UNIT - Soluciones Digitales Inteligentes" />
  <meta name="copyright" content="UNIT 2026" />

  <link rel="icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />
  <link rel="shortcut icon" href="./assets/img/icon/ICONO1.png" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png" />

  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://unit.pe/" /> <meta property="og:title" content="UNIT | Ecosistemas Digitales de Alta Fidelidad" />
  <meta property="og:description" content="Desarrollo de software, sistemas avanzados y plataformas interactivas. Explora nuestras demos en tiempo real." />
  <meta property="og:image" content="https://unit.pe/assets/img/og-preview.jpg" /> 
  <meta property="og:site_name" content="UNIT" />
  <meta property="og:locale" content="es_PE" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="UNIT | Ecosistemas Digitales" />
  <meta name="twitter:description" content="Diseño de alta fidelidad y arquitectura de software robusta para tu proyecto." />
  <meta name="twitter:image" content="https://unit.pe/assets/img/og-preview.jpg" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Sora:wght@700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    /* ============================
       RESET & VARIABLES
    ============================ */
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --bg:           #08080f;
      --surface:      #0f0f1a;
      --surface2:     #141428;
      --purple:       #7c3aed;
      --purple-light: #a855f7;
      --purple-glow:  #c084fc;
      --green:        #22c55e;
      --text:         #f1f0ff;
      --muted:        #8b8aa8;
      --border:       #1e1e38;
      --wh-green:     #25D366;
      --nav-h:        64px;
    }

    html { scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* Only hide native cursor on non-touch devices */
    @media (hover: hover) and (pointer: fine) {
      body { cursor: none; }
      a, button, select, input, textarea, label { cursor: none; }
    }

    a { text-decoration: none; color: inherit; }

    /* ============================
       CUSTOM CURSOR (desktop only)
    ============================ */
    .cursor-dot,
    .cursor-ring,
    .cursor-glow {
      position: fixed;
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      display: none; /* hidden until mousemove */
    }

    .cursor-dot {
      width: 10px; height: 10px;
      background: var(--purple-glow);
      box-shadow: 0 0 10px 3px rgba(168,85,247,0.6);
      transition: transform 0.08s ease;
      z-index: 10001;
    }

    .cursor-ring {
      width: 36px; height: 36px;
      border: 1.5px solid rgba(168,85,247,0.55);
      transition: width 0.2s, height 0.2s, border-color 0.2s;
      z-index: 10000;
    }

    .cursor-glow {
      width: 320px; height: 320px;
      background: radial-gradient(circle, rgba(124,58,237,0.1) 0%, transparent 70%);
      z-index: 9998;
    }

    .cursor-active .cursor-ring {
      width: 52px; height: 52px;
      border-color: var(--purple-light);
    }

    .cursor-click .cursor-dot {
      transform: translate(-50%,-50%) scale(0.55);
    }

    /* ============================
       NAVBAR
    ============================ */
    .navbar{
    height: var(--nav-h);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 3rem;
    border-bottom:1px solid var(--border);
    background:rgba(8,8,15,0.9);

    position:fixed;
    top:0;
    left:0;
    width:100%;

    z-index:500;

    backdrop-filter:blur(16px);
    -webkit-backdrop-filter:blur(16px);
}

    .logo {
      font-family: 'Sora', sans-serif;
      font-size: 1.3rem;
      font-weight: 800;
      color: var(--text);
      letter-spacing: -0.02em;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      flex-shrink: 0;
    }

    .logo-img { height: 42px; width: auto; display: block; }

    .nav-links {
      display: flex;
      gap: 2.25rem;
      list-style: none;
    }

    .nav-links a {
      color: var(--muted);
      font-size: 0.875rem;
      font-weight: 500;
      transition: color 0.2s;
      position: relative;
      white-space: nowrap;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -3px; left: 0;
      width: 0; height: 1px;
      background: var(--purple-light);
      transition: width 0.25s ease;
    }

    .nav-links a:hover { color: var(--text); }
    .nav-links a:hover::after { width: 100%; }

    .nav-right { display: flex; align-items: center; gap: 0.75rem; flex-shrink: 0; }

    .nav-whatsapp {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      color: var(--wh-green);
      font-size: 0.82rem;
      font-weight: 600;
      border: 1px solid rgba(37,211,102,0.3);
      border-radius: 8px;
      padding: 0.45rem 0.9rem;
      transition: background 0.2s;
      white-space: nowrap;
    }

    .nav-whatsapp:hover { background: rgba(37,211,102,0.1); }

    .nav-cta {
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      color: #fff;
      padding: 0.5rem 1.2rem;
      border-radius: 9px;
      font-size: 0.85rem;
      font-weight: 600;
      border: none;
      font-family: 'Inter', sans-serif;
      white-space: nowrap;
      transition: opacity 0.2s, transform 0.15s;
      box-shadow: 0 4px 16px rgba(124,58,237,0.3);
    }

    .nav-cta:hover { opacity: 0.88; transform: translateY(-1px); }

    /* Hamburger */
    .nav-hamburger {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      padding: 4px;
      z-index: 600;
    }

    .nav-hamburger span {
      display: block;
      width: 24px; height: 2px;
      background: var(--text);
      border-radius: 2px;
      transition: transform 0.3s, opacity 0.3s;
    }

    .nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .nav-hamburger.open span:nth-child(2) { opacity: 0; }
    .nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    /* Mobile menu drawer */
    .mobile-menu {
      display: none;
      position: fixed;
      top: var(--nav-h); left: 0; right: 0;
      background: rgba(8,8,15,0.98);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      padding: 1.5rem 1.5rem 2rem;
      z-index: 490;
      flex-direction: column;
      gap: 0;
      transform: translateY(-10px);
      opacity: 0;
      transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .mobile-menu.open {
      display: flex;
      transform: translateY(0);
      opacity: 1;
    }

    .mobile-menu a {
      display: block;
      padding: 0.9rem 0;
      color: var(--muted);
      font-size: 1rem;
      font-weight: 500;
      border-bottom: 1px solid var(--border);
      transition: color 0.2s;
    }

    .mobile-menu a:last-child { border-bottom: none; }
    .mobile-menu a:hover { color: var(--text); }

    .mobile-menu-actions {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      margin-top: 1.25rem;
    }

    /* ============================
       HERO
    ============================ */
    .hero {
      margin-top: var(--nav-h);
      min-height: calc(100vh - var(--nav-h));
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      gap: 2rem;
      padding: 4rem 3rem;
      position: relative;
      overflow: hidden;
    }

    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(90px);
      pointer-events: none;
      opacity: 0.28;
      z-index: 0;
    }

    .orb-1 { width: 600px; height: 600px; background: #4c1d95; top: -180px; left: -100px; }
    .orb-2 { width: 380px; height: 380px; background: #1d4ed8; bottom: -100px; right: 8%; }
    .orb-3 { width: 220px; height: 220px; background: var(--purple); top: 40%; right: 4%; opacity: 0.12; }

    .hero-left { position: relative; z-index: 1; }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(124,58,237,0.13);
      border: 1px solid rgba(124,58,237,0.38);
      border-radius: 999px;
      padding: 0.38rem 1rem;
      font-size: 0.78rem;
      color: var(--purple-glow);
      margin-bottom: 1.5rem;
      font-weight: 500;
    }

    .badge-dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--green);
      animation: pulse 2s infinite;
      flex-shrink: 0;
    }

    @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.4;transform:scale(0.8)} }

    .hero h1 {
      font-family: 'Sora', sans-serif;
      font-size: clamp(2.4rem, 4.2vw, 3.8rem);
      font-weight: 800;
      line-height: 1.07;
      letter-spacing: -0.03em;
      margin-bottom: 1.4rem;
    }

    .hl  { color: var(--purple-light); }
    .hl2 { color: var(--green); }

    .hero-sub {
      color: var(--muted);
      font-size: 1.05rem;
      line-height: 1.78;
      margin-bottom: 2.2rem;
      max-width: 480px;
    }

    .hero-actions {
      display: flex;
      gap: 0.85rem;
      flex-wrap: wrap;
      margin-bottom: 2.5rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      color: #fff;
      padding: 0.8rem 1.8rem;
      border-radius: 10px;
      font-weight: 600;
      font-size: 0.92rem;
      border: none;
      font-family: 'Inter', sans-serif;
      transition: opacity 0.2s, transform 0.15s;
      box-shadow: 0 4px 24px rgba(124,58,237,0.35);
      display: inline-flex; align-items: center; gap: 0.4rem;
    }

    .btn-primary:hover { opacity: 0.88; transform: translateY(-2px); }

    .btn-secondary {
      background: transparent;
      color: var(--text);
      padding: 0.8rem 1.8rem;
      border-radius: 10px;
      font-weight: 500;
      font-size: 0.92rem;
      border: 1px solid var(--border);
      font-family: 'Inter', sans-serif;
      transition: border-color 0.2s, background 0.2s;
      display: inline-flex; align-items: center; gap: 0.4rem;
    }

    .btn-secondary:hover { border-color: rgba(168,85,247,0.5); background: rgba(124,58,237,0.07); }

    .hero-trust {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .trust-avatars { display: flex; }

    .trust-avatars span {
      width: 34px; height: 34px;
      border-radius: 50%;
      border: 2px solid var(--bg);
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      display: flex; align-items: center; justify-content: center;
      font-size: 0.68rem;
      font-weight: 700;
      margin-left: -9px;
    }

    .trust-avatars span:first-child { margin-left: 0; }
    .trust-text { color: var(--muted); font-size: 0.83rem; }
    .trust-text strong { color: var(--text); }

    /* HERO RIGHT — 3D Scene */
    .hero-right {
      position: relative;
      z-index: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 500px;
    }

    .hero-3d-scene {
      position: relative;
      width: 380px;
      height: 380px;
    }

    .scene-platform {
      position: absolute;
      bottom: 14px; left: 50%;
      transform: translateX(-50%);
      width: 220px; height: 22px;
      background: linear-gradient(180deg, rgba(124,58,237,0.45), transparent);
      border-radius: 50%;
      filter: blur(10px);
      animation: platformPulse 3s ease-in-out infinite;
    }

    @keyframes platformPulse {
      0%,100%{ opacity:0.55; transform:translateX(-50%) scaleX(1); }
      50%{ opacity:0.85; transform:translateX(-50%) scaleX(1.1); }
    }

    .cube-wrapper {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-55%);
      animation: floatUD 4s ease-in-out infinite;
    }

    @keyframes floatUD {
      0%,100%{ transform:translate(-50%,-55%); }
      50%{ transform:translate(-50%,-63%); }
    }

    .cube {
      width: 130px; height: 130px;
      position: relative;
      transform-style: preserve-3d;
      animation: spinCube 12s linear infinite;
    }

    @keyframes spinCube {
      from { transform: rotateX(20deg) rotateY(0deg); }
      to   { transform: rotateX(20deg) rotateY(360deg); }
    }

    .cube-face {
      position: absolute;
      width: 130px; height: 130px;
      border-radius: 18px;
      border: 1px solid rgba(168,85,247,0.45);
      display: flex; align-items: center; justify-content: center;
      font-size: 2.6rem;
      backface-visibility: hidden;
    }

    .face-front  { background:linear-gradient(135deg,rgba(124,58,237,0.75),rgba(168,85,247,0.5)); transform:translateZ(65px); }
    .face-back   { background:linear-gradient(135deg,rgba(30,30,60,0.9),rgba(60,20,120,0.7));    transform:rotateY(180deg) translateZ(65px); }
    .face-left   { background:linear-gradient(135deg,rgba(80,20,160,0.7),rgba(30,30,80,0.85));   transform:rotateY(-90deg) translateZ(65px); }
    .face-right  { background:linear-gradient(135deg,rgba(100,30,180,0.65),rgba(50,10,100,0.8)); transform:rotateY(90deg) translateZ(65px); }
    .face-top    { background:linear-gradient(135deg,rgba(168,85,247,0.85),rgba(124,58,237,0.6)); transform:rotateX(90deg) translateZ(65px); }
    .face-bottom { background:linear-gradient(135deg,rgba(20,20,40,0.9),rgba(60,20,120,0.5));    transform:rotateX(-90deg) translateZ(65px); }

    .orbit-ring {
      position: absolute;
      top: 50%; left: 50%;
      border-radius: 50%;
      border: 1px solid rgba(168,85,247,0.22);
      transform: translate(-50%,-50%);
    }

    .orbit-ring-1 { width:220px; height:220px; animation:orbitSpin 8s linear infinite; }
    .orbit-ring-2 { width:300px; height:300px; border-color:rgba(124,58,237,0.13); animation:orbitSpin 14s linear infinite reverse; }
    .orbit-ring-3 { width:366px; height:366px; border-color:rgba(168,85,247,0.07); animation:orbitSpin 20s linear infinite; }

    @keyframes orbitSpin {
      from { transform:translate(-50%,-50%) rotateX(72deg) rotateZ(0deg); }
      to   { transform:translate(-50%,-50%) rotateX(72deg) rotateZ(360deg); }
    }

    .orbit-dot {
      position: absolute;
      width: 9px; height: 9px;
      border-radius: 50%;
      background: var(--purple-light);
      top: -4.5px; left: 50%; margin-left: -4.5px;
      box-shadow: 0 0 10px 2px var(--purple-light);
    }

    .float-card {
      position: absolute;
      background: rgba(12,12,22,0.92);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 0.55rem 0.9rem;
      display: flex; align-items: center; gap: 0.45rem;
      font-size: 0.74rem;
      font-weight: 600;
      backdrop-filter: blur(10px);
      white-space: nowrap;
      box-shadow: 0 8px 28px rgba(0,0,0,0.45);
    }

    .float-card-1 { top:28px; right:2px; animation:fc1 5s ease-in-out infinite; color:var(--green); border-color:rgba(34,197,94,0.25); }
    .float-card-2 { bottom:76px; left:-8px; animation:fc2 6s ease-in-out infinite; color:var(--purple-glow); }
    .float-card-3 { bottom:158px; right:-8px; animation:fc3 4.5s ease-in-out infinite; color:#60a5fa; border-color:rgba(96,165,250,0.25); }

    @keyframes fc1 { 0%,100%{transform:translateY(0)}  50%{transform:translateY(-10px)} }
    @keyframes fc2 { 0%,100%{transform:translateY(0)}  50%{transform:translateY(9px)} }
    @keyframes fc3 { 0%,100%{transform:translateY(0)}  50%{transform:translateY(-7px)} }

    .fc-dot { width:7px; height:7px; border-radius:50%; background:currentColor; flex-shrink:0; }

    /* ============================
       STATS STRIP
    ============================ */
    .stats-strip {
      margin: 0 3rem;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 2rem 3rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      align-items: center;
      justify-content: space-around;
    }

    .stat-item { text-align: center; }

    .stat-num {
      font-family: 'Sora', sans-serif;
      font-size: 2.2rem;
      font-weight: 800;
      line-height: 1;
    }

    .stat-num em { color: var(--purple-light); font-style: normal; }
    .stat-lbl { color: var(--muted); font-size: 0.82rem; margin-top: 0.3rem; }
    .stat-divider { width: 1px; height: 52px; background: var(--border); flex-shrink: 0; }

    /* ============================
       SECTION SHARED
    ============================ */
    .section-wrap {
      padding: 5.5rem 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .section-label {
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--purple-glow);
      margin-bottom: 0.6rem;
    }

    .section-title {
      font-family: 'Sora', sans-serif;
      font-size: clamp(1.85rem, 3vw, 2.6rem);
      font-weight: 800;
      line-height: 1.12;
      letter-spacing: -0.025em;
      margin-bottom: 0.85rem;
    }

    .section-sub {
      color: var(--muted);
      font-size: 1rem;
      max-width: 520px;
      line-height: 1.75;
      margin-bottom: 3rem;
    }

    /* ============================
       SERVICES
    ============================ */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.15rem;
    }

    .card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 1.75rem;
      transition: border-color 0.3s, transform 0.25s, box-shadow 0.3s;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; height: 1px;
      background: linear-gradient(90deg, transparent, rgba(168,85,247,0.55), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .card:hover { border-color: rgba(124,58,237,0.48); transform: translateY(-4px); box-shadow: 0 16px 44px rgba(124,58,237,0.12); }
    .card:hover::before { opacity: 1; }

    .card-icon {
      width: 46px; height: 46px;
      border-radius: 11px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 1.2rem;
      font-size: 1.35rem;
      background: rgba(124,58,237,0.13);
      border: 1px solid rgba(124,58,237,0.25);
    }

    .card h3 {
      font-family: 'Sora', sans-serif;
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 0.45rem;
    }

    .card p { color: var(--muted); font-size: 0.86rem; line-height: 1.65; }

    .card-tag {
      display: inline-block;
      margin-top: 1rem;
      font-size: 0.72rem;
      color: var(--purple-light);
      background: rgba(168,85,247,0.1);
      border-radius: 6px;
      padding: 0.2rem 0.6rem;
      border: 1px solid rgba(168,85,247,0.2);
    }

    /* ============================
       BOTS SECTION
    ============================ */
    .bots-section {
      background: var(--surface);
      border-top: 1px solid var(--border);
      border-bottom: 1px solid var(--border);
      padding: 5.5rem 3rem;
      overflow: hidden;
    }

    .bots-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4.5rem;
      align-items: center;
    }

    .bots-right {
      position: relative;
      height: 420px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* 3D Phone */
    .wh-scene {
      position: relative;
      width: 260px;
      height: 380px;
    }

    .wh-phone {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
      animation: phoneFloat 4s ease-in-out infinite;
    }

    @keyframes phoneFloat {
      0%,100%{ transform:translate(-50%,-50%) rotateY(-10deg) rotateZ(-2deg); }
      50%{ transform:translate(-50%,-57%) rotateY(8deg) rotateZ(2deg); }
    }

    .phone-body {
      width: 162px;
      height: 264px;
      background: linear-gradient(160deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      border-radius: 28px;
      border: 2px solid rgba(168,85,247,0.28);
      box-shadow:
        0 40px 80px rgba(0,0,0,0.65),
        0 0 0 1px rgba(255,255,255,0.05),
        inset 0 1px 0 rgba(255,255,255,0.1);
      overflow: hidden;
      position: relative;
    }

    .phone-screen {
      position: absolute;
      inset: 6px;
      background: #075e54;
      border-radius: 22px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }

    .phone-header {
      background: #075e54;
      padding: 10px 12px 8px;
      display: flex; align-items: center; gap: 8px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
      flex-shrink: 0;
    }

    .phone-avatar {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  overflow: hidden;
  background: var(--wh-green);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.phone-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

    .phone-name { font-size: 0.68rem; font-weight: 600; color: #fff; }
    .phone-status { font-size: 0.56rem; color: rgba(255,255,255,0.6); }

    .phone-chat {
      flex: 1;
      background: #0b1f1a;
      padding: 10px 8px;
      display: flex;
      flex-direction: column;
      gap: 6px;
      overflow: hidden;
    }

    .chat-bubble {
      border-radius: 12px;
      padding: 6px 10px;
      font-size: 0.59rem;
      line-height: 1.4;
      max-width: 85%;
    }

    .bubble-in {
      background: rgba(255,255,255,0.1);
      color: #fff;
      align-self: flex-start;
      border-bottom-left-radius: 3px;
    }

    .bubble-out {
      background: #128c7e;
      color: #fff;
      align-self: flex-end;
      border-bottom-right-radius: 3px;
    }

    .bubble-typing {
      background: rgba(255,255,255,0.1);
      align-self: flex-start;
      border-bottom-left-radius: 3px;
      display: flex; gap: 3px; align-items: center;
      padding: 8px 12px;
      border-radius: 12px;
    }

    .typing-dot {
      width: 5px; height: 5px;
      border-radius: 50%;
      background: rgba(255,255,255,0.5);
    }

    .typing-dot:nth-child(1) { animation: bounce 1s ease-in-out 0s infinite; }
    .typing-dot:nth-child(2) { animation: bounce 1s ease-in-out 0.2s infinite; }
    .typing-dot:nth-child(3) { animation: bounce 1s ease-in-out 0.4s infinite; }

    @keyframes bounce { 0%,60%,100%{transform:translateY(0)} 30%{transform:translateY(-5px)} }

    .phone-glow {
      position: absolute;
      bottom: 8px; left: 50%;
      transform: translateX(-50%);
      width: 110px; height: 28px;
      background: var(--wh-green);
      border-radius: 50%;
      filter: blur(18px);
      opacity: 0.22;
      animation: gp 3s ease-in-out infinite;
    }

    @keyframes gp { 0%,100%{opacity:0.18} 50%{opacity:0.38} }

    .wh-float-icon{
    width:52px;
    height:52px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:absolute;

    background:linear-gradient(135deg,#7c25d3,#31128c);
    color:#fff;
    font-size:1.35rem;

    box-shadow:
        0 10px 30px rgba(124, 37, 211, 0.35),
        inset 0 1px 2px rgba(255,255,255,.25);

    backdrop-filter:blur(10px);
}

    .wh-icon-1 { top:18px; right:8px; animation:wfi1 5s ease-in-out infinite;}
    .wh-icon-2 { top:50%; left:-12px; transform:translateY(-50%); animation:wfi2 6s ease-in-out infinite; }
    .wh-icon-3 { bottom:38px; right:-2px; animation:wfi3 4.5s ease-in-out infinite; }

    @keyframes wfi1 { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-12px) rotate(6deg)} }
    @keyframes wfi2 { 0%,100%{transform:translateY(-50%)} 50%{transform:translateY(calc(-50% + 10px))} }
    @keyframes wfi3 { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-8px) rotate(-6deg)} }

    .bots-features {
      display: flex;
      flex-direction: column;
      gap: 0.7rem;
      margin-top: 1.75rem;
    }

    .bot-feature {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-size: 0.875rem;
      color: var(--muted);
    }

    .bot-feature-icon {
      width: 28px; height: 28px;
      border-radius: 7px;
      background: rgba(34,197,94,0.11);
      border: 1px solid rgba(34,197,94,0.25);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.78rem;
      color: var(--green);
      flex-shrink: 0;
    }

    /* ============================
       PROCESS
    ============================ */
    .process-section {
      padding: 5.5rem 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .process-header {
      text-align: center;
      max-width: 600px;
      margin: 0 auto 3.5rem;
    }

    .process-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.25rem;
      position: relative;
    }

    .process-connector {
      position: absolute;
      top: 28px;
      left: calc(12.5% + 28px);
      right: calc(12.5% + 28px);
      height: 1px;
      background: linear-gradient(90deg, var(--purple), var(--purple-light), var(--purple));
      opacity: 0.28;
    }

    .process-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 1.75rem 1.25rem;
      text-align: center;
      position: relative;
      z-index: 1;
      transition: border-color 0.3s, transform 0.25s, box-shadow 0.3s;
    }

    .process-card:hover { border-color: rgba(124,58,237,0.42); transform: translateY(-4px); box-shadow: 0 12px 36px rgba(124,58,237,0.1); }

    .process-num {
      width: 56px; height: 56px;
      border-radius: 50%;
      background: rgba(124,58,237,0.13);
      border: 1px solid rgba(124,58,237,0.32);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 1.25rem;
      font-family: 'Sora', sans-serif;
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--purple-light);
    }

    .process-card h4 {
      font-family: 'Sora', sans-serif;
      font-size: 0.98rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .process-card p { color: var(--muted); font-size: 0.84rem; line-height: 1.6; }

    /* ============================
       CONTACT
    ============================ */
    .contact-section {
      padding: 5.5rem 3rem;
      background: var(--surface);
      border-top: 1px solid var(--border);
    }

    .contact-inner {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4.5rem;
      align-items: start;
    }

    .contact-left h2 {
      font-family: 'Sora', sans-serif;
      font-size: clamp(2rem, 3vw, 2.8rem);
      font-weight: 800;
      letter-spacing: -0.025em;
      margin-bottom: 1rem;
      line-height: 1.1;
    }

    .contact-left > p {
      color: var(--muted);
      font-size: 1rem;
      line-height: 1.75;
      margin-bottom: 1.75rem;
    }

    .wh-cta-big {
      display: flex;
      align-items: center;
      gap: 1rem;
      background: linear-gradient(135deg, rgba(37,211,102,0.14), rgba(37,211,102,0.04));
      border: 1px solid rgba(37,211,102,0.32);
      border-radius: 16px;
      padding: 1.2rem 1.5rem;
      margin-bottom: 1.25rem;
      transition: transform 0.2s, box-shadow 0.2s;
      position: relative;
      overflow: hidden;
    }

    .wh-cta-big:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(37,211,102,0.15); }

    .wh-cta-icon {
      width: 52px; height: 52px;
      border-radius: 14px;
      background: var(--wh-green);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.5rem;
      flex-shrink: 0;
      box-shadow: 0 6px 18px rgba(37,211,102,0.35);
      color: #fff;
    }

    .wh-cta-text { flex: 1; }
    .wh-cta-title { font-family: 'Sora', sans-serif; font-size: 1rem; font-weight: 700; margin-bottom: 0.18rem; }
    .wh-cta-sub { color: var(--muted); font-size: 0.8rem; }

    .wh-cta-arrow { color: var(--wh-green); font-size: 1.1rem; transition: transform 0.2s; }
    .wh-cta-big:hover .wh-cta-arrow { transform: translateX(5px); }

    .social-row {
      display: flex;
      gap: 0.65rem;
      margin-bottom: 1.75rem;
      flex-wrap: wrap;
    }

    .social-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.45rem;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.6rem 1rem;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--muted);
      transition: border-color 0.2s, color 0.2s, transform 0.2s, background 0.2s;
      font-family: 'Inter', sans-serif;
    }

    .social-btn:hover { transform: translateY(-2px); }
    .social-btn.ig:hover { color: #e1306c; border-color: rgba(225,48,108,0.4); background: rgba(225,48,108,0.06); }
    .social-btn.fb:hover { color: #1877f2; border-color: rgba(24,119,242,0.4); background: rgba(24,119,242,0.06); }
    .social-btn.tk:hover { color: #f1f0ff; border-color: rgba(241,240,255,0.3); background: rgba(255,255,255,0.05); }
    .social-btn.li:hover { color: #0a66c2; border-color: rgba(10,102,194,0.4); background: rgba(10,102,194,0.06); }

    .contact-info-box {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 1.2rem 1.4rem;
      font-size: 0.85rem;
    }

    .contact-info-box p:first-child { color: var(--text); font-weight: 600; margin-bottom: 0.25rem; }
    .contact-info-box p:last-child { color: var(--muted); }

    /* Form */
    .contact-right {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2rem;
    }

    .contact-right h3 {
      font-family: 'Sora', sans-serif;
      font-size: 1.15rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .form-group { margin-bottom: 1rem; }

    .form-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--muted);
      margin-bottom: 0.38rem;
    }

    .form-input,
    .form-textarea,
    .form-select {
      width: 100%;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: 9px;
      padding: 0.7rem 1rem;
      color: var(--text);
      font-size: 0.875rem;
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: border-color 0.2s, box-shadow 0.2s;
      -webkit-appearance: none; appearance: none;
    }

    .form-input::placeholder,
    .form-textarea::placeholder { color: rgba(139,138,168,0.55); }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
      border-color: var(--purple);
      box-shadow: 0 0 0 3px rgba(124,58,237,0.12);
    }

    .form-textarea { resize: vertical; min-height: 90px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }

    .form-submit {
      width: 100%;
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      color: #fff;
      padding: 0.85rem;
      border-radius: 10px;
      font-weight: 700;
      font-size: 0.95rem;
      border: none;
      font-family: 'Inter', sans-serif;
      margin-top: 0.5rem;
      transition: opacity 0.2s, transform 0.15s;
      box-shadow: 0 4px 20px rgba(124,58,237,0.3);
      display: flex; align-items: center; justify-content: center; gap: 0.5rem;
    }

    .form-submit:hover { opacity: 0.88; transform: translateY(-1px); }

    /* ============================
       FOOTER
    ============================ */
    .footer { background: var(--bg); border-top: 1px solid var(--border); }

    .footer-top {
      display: grid;
      grid-template-columns: 1.6fr 1fr 1fr 1fr;
      gap: 3rem;
      padding: 3.5rem 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-brand p {
      color: var(--muted);
      font-size: 0.84rem;
      line-height: 1.72;
      margin: 1rem 0 1.5rem;
    }

    .footer-social {
      display: flex;
      gap: 0.55rem;
      flex-wrap: wrap;
    }

    .footer-social a {
      width: 34px; height: 34px;
      border-radius: 8px;
      background: var(--surface);
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      color: var(--muted);
      font-size: 0.88rem;
      transition: border-color 0.2s, background 0.2s, color 0.2s;
    }

    .footer-social a:hover { border-color: var(--purple); background: rgba(124,58,237,0.12); color: var(--purple-glow); }

    .footer-col h4 {
      font-family: 'Sora', sans-serif;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 1.1rem;
      letter-spacing: 0.03em;
    }

    .footer-col ul { list-style: none; }
    .footer-col li { margin-bottom: 0.65rem; }

    .footer-col a {
      color: var(--muted);
      font-size: 0.83rem;
      transition: color 0.2s;
      display: inline-flex; align-items: center; gap: 0.4rem;
    }

    .footer-col a:hover { color: var(--purple-glow); }

    .footer-wh-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(37,211,102,0.1);
      border: 1px solid rgba(37,211,102,0.3);
      border-radius: 8px;
      padding: 0.5rem 0.9rem;
      color: var(--wh-green) !important;
      font-weight: 600;
      font-size: 0.82rem;
      margin-top: 0.75rem;
      transition: background 0.2s !important;
    }

    .footer-wh-btn:hover { background: rgba(37,211,102,0.18) !important; color: var(--wh-green) !important; }

    .footer-bottom {
      border-top: 1px solid var(--border);
      padding: 1.25rem 3rem;
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .footer-copy { color: var(--muted); font-size: 0.78rem; }

    .footer-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(124,58,237,0.1);
      border: 1px solid rgba(124,58,237,0.25);
      border-radius: 20px;
      padding: 0.3rem 0.85rem;
      font-size: 0.75rem;
      color: var(--purple-glow);
    }

    /* ============================
       SCROLL REVEAL
    ============================ */
    .reveal {
      opacity: 0;
      transform: translateY(22px);
      transition: opacity 0.55s ease, transform 0.55s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* ============================
       RESPONSIVE — TABLET (≤ 1024px)
    ============================ */
    @media (max-width: 1024px) {
      .navbar { padding: 0 1.75rem; }

      .hero { padding: 3.5rem 1.75rem; gap: 2rem; }

      .stats-strip { margin: 0 1.75rem; padding: 2rem 1.75rem; }

      .section-wrap { padding: 4.5rem 1.75rem; }

      .cards-grid { grid-template-columns: repeat(2, 1fr); }

      .bots-section { padding: 4.5rem 1.75rem; }
      .bots-inner { gap: 3rem; }

      .process-section { padding: 4.5rem 1.75rem; }

      .contact-section { padding: 4.5rem 1.75rem; }
      .contact-inner { gap: 3rem; }

      .footer-top { padding: 3rem 1.75rem; gap: 2rem; }
      .footer-bottom { padding: 1.2rem 1.75rem; }
    }

    /* ============================
       RESPONSIVE — MOBILE (≤ 768px)
    ============================ */
    @media (max-width: 768px) {
      :root { --nav-h: 60px; }

      /* Nav */
      .navbar { padding: 0 1.25rem; }
      .nav-links { display: none; }
      .nav-whatsapp .wh-label { display: none; }
      .nav-hamburger { display: flex; }
      .nav-cta { display: none; } /* shown in mobile menu instead */

      /* Hero becomes single column */
      .hero {
        grid-template-columns: 1fr;
        min-height: auto;
        padding: 3rem 1.25rem 2.5rem;
        text-align: center;
      }

      .hero-left { order: 1; }
      .hero-right { order: 2; height: 280px; }

      .hero-badge { justify-content: center; }
      .hero-sub { margin: 0 auto 2rem; }
      .hero-actions { justify-content: center; }
      .hero-trust { justify-content: center; }

      /* 3D scene scales down */
      .hero-3d-scene { width: 280px; height: 280px; transform: scale(0.85); }

      /* Float cards hidden on small screens to avoid overflow */
      .float-card { display: none; }

      /* Stats */
      .stats-strip {
        margin: 0 1.25rem;
        padding: 1.75rem 1.25rem;
        gap: 1.25rem;
      }

      .stat-divider { display: none; }

      .stat-item { flex: 1 1 calc(50% - 0.625rem); }

      /* Services */
      .section-wrap { padding: 3.5rem 1.25rem; }
      .cards-grid { grid-template-columns: 1fr; }

      /* Bots */
      .bots-section { padding: 3.5rem 1.25rem; }
      .bots-inner { grid-template-columns: 1fr; gap: 3rem; }
      .bots-right { height: 320px; }

      /* Process */
      .process-section { padding: 3.5rem 1.25rem; }
      .process-grid { grid-template-columns: 1fr 1fr; gap: 1rem; }
      .process-connector { display: none; }

      /* Contact */
      .contact-section { padding: 3.5rem 1.25rem; }
      .contact-inner { grid-template-columns: 1fr; gap: 2.5rem; }

      /* Footer */
      .footer-top {
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        padding: 2.5rem 1.25rem;
      }

      .footer-brand { grid-column: 1 / -1; }

      .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        padding: 1.25rem;
        gap: 0.75rem;
      }
    }

    /* ============================
       RESPONSIVE — SMALL MOBILE (≤ 480px)
    ============================ */
    @media (max-width: 480px) {
      .hero h1 { font-size: 2.1rem; }

      .hero-actions { flex-direction: column; align-items: center; }
      .btn-primary, .btn-secondary { width: 100%; justify-content: center; }

      .cards-grid { grid-template-columns: 1fr; }
      .process-grid { grid-template-columns: 1fr; }

      .form-row { grid-template-columns: 1fr; }

      .footer-top { grid-template-columns: 1fr; }

      .social-row { gap: 0.5rem; }
      .social-btn { padding: 0.55rem 0.8rem; font-size: 0.78rem; }

      .stats-strip { gap: 1rem; }
      .stat-item { flex: 1 1 100%; }
      .stat-num { font-size: 1.85rem; }

      .bots-right { height: 260px; }
      .wh-scene { transform: scale(0.85); transform-origin: center; }
    }

    /* Reduce motion */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
    }
 
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

/* Contenedor General del Dispositivo (Estilo Laptop/Tablet de Cristal) */
  .device-mockup {
    background: #090B11;
    border: 1px solid #1A2333;
    border-radius: 16px;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.8), inset 0 1px 0 rgba(255, 255, 255, 0.05);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    width: 100%;
    min-height: 420px;
    position: relative;
    z-index: 2;
  }

  /* Cabecera del Navegador incorporado */
  .device-header {
    background: #111520;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #1A2333;
    gap: 20px;
  }
  .device-dots { display: flex; gap: 6px; }
  .device-dots span { width: 10px; height: 10px; border-radius: 50%; display: block; }
  .dot-r { background: #FF5F56; }
  .dot-y { background: #FFBD2E; }
  .dot-g { background: #27C93F; }
  
  .device-search-bar {
    background: #06080C;
    border: 1px solid #1F2A3E;
    color: #94A3B8;
    border-radius: 8px;
    padding: 4px 16px;
    font-size: 0.75rem;
    font-family: monospace;
    display: flex;
    align-items: center;
    gap: 8px;
    flex: 1;
    max-width: 320px;
  }

  /* Pestañas de Navegación del producto */
  .device-nav-tabs {
    background: #151B27;
    display: flex;
    border-bottom: 1px solid #1A2333;
    overflow-x: auto;
  }
  .device-tab {
    background: transparent;
    border: none;
    outline: none;
    color: #64748B;
    padding: 12px 20px;
    font-size: 0.85rem;
    font-weight: 600;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    border-right: 1px solid #1A2333;
    transition: all 0.2s ease;
  }
  .device-tab:hover { color: #FFF; background: rgba(255,255,255,0.01); }
  .device-tab.active {
    background: #090B11;
    color: #FFF;
    border-bottom: 2px solid #00E676;
  }

  /* Pantalla de Visualización Principal */
  .device-screen-content {
    padding: 24px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: radial-gradient(circle at top, #121A2E 0%, #090B11 100%);
  }

  /* Animación de entrada fluida */
  .dynamic-fade {
    animation: deviceContentFade 0.35s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    width: 100%;
  }

  /* --- COMPONENTE INTERNO: DASHBOARD VOY --- */
  .voy-dashboard { width: 100%; }
  .voy-header-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 14px;
  }
  .badge-live {
    font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: #00E676;
    background: rgba(0, 230, 118, 0.1);
    padding: 4px 10px;
    border-radius: 20px;
  }
  .voy-map-widget {
    height: 160px;
    background: #0B0E17;
    border: 1px solid #1F2A3E;
    border-radius: 12px;
    position: relative;
    overflow: hidden;
    margin-bottom: 16px;
  }
  .map-grid-lines {
    position: absolute;
    inset: 0;
    background-size: 20px 20px;
    background-image: linear-gradient(to right, rgba(255,255,255,0.02) 1px, transparent 1px),
                      linear-gradient(to bottom, rgba(255,255,255,0.02) 1px, transparent 1px);
  }
  .map-vector-route {
    position: absolute;
    width: 80%; height: 2px;
    background: #1E293B;
    border-top: 2px dashed #00E676;
    top: 55%; left: 10%;
    transform: rotate(-5deg);
  }
  .map-marker-car {
    position: absolute;
    top: 45%; left: 45%;
    background: #00E676;
    color: #000;
    width: 28px; height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    box-shadow: 0 0 15px rgba(0, 230, 118, 0.6);
    animation: floatMarker 3s ease-in-out infinite;
  }
  .marker-pulse {
    position: absolute;
    inset: -4px;
    border-radius: 50%;
    border: 2px solid #00E676;
    animation: pulseMarker 1.8s infinite;
  }
  .map-pop-info {
    position: absolute;
    top: 14px; left: 14px;
    background: rgba(17, 21, 32, 0.85);
    border: 1px solid #2D3D54;
    padding: 4px 10px;
    border-radius: 6px;
    font-size: 0.65rem;
    color: #E2E8F0;
    backdrop-filter: blur(4px);
  }

  .voy-metrics { display: flex; gap: 10px; }
  .metric-pill {
    flex: 1;
    background: #111622;
    border: 1px solid #1F2A3E;
    padding: 10px;
    border-radius: 8px;
    text-align: center;
  }
  .metric-label { display: block; font-size: 0.65rem; color: #64748B; margin-bottom: 2px; }
  .metric-value { display: block; font-size: 1rem; font-weight: 700; color: #F1F5F9; }

  /* --- COMPONENTE INTERNO: PORTAL WEB --- */
  .portal-mockup {
    background: #F8FAFC;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
  }
  .portal-nav {
    background: #0F172A;
    padding: 10px 16px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #FFF;
    font-size: 0.7rem;
    font-weight: bold;
  }
  .portal-hero {
    padding: 24px 16px;
    text-align: center;
    color: #1E293B;
  }
  .portal-hero h4 { font-size: 1.1rem; margin-bottom: 6px; color: #0F172A; font-weight: 800; }
  .portal-hero p { font-size: 0.75rem; color: #64748B; margin-bottom: 12px; }
  .portal-btn {
    background: #00B0FF;
    color: #FFF;
    padding: 6px 14px;
    border-radius: 6px;
    font-size: 0.7rem;
    display: inline-block;
    font-weight: bold;
  }

  /* --- COMPONENTE INTERNO: UX DASHBOARD --- */
  .ux-analytics-box { width: 100%; }
  .ux-chart-container {
    height: 130px;
    display: flex;
    align-items: flex-end;
    gap: 14px;
    padding: 10px;
    background: rgba(0,0,0,0.2);
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.03);
    margin-bottom: 14px;
  }
  .ux-bar {
    flex: 1;
    background: linear-gradient(to top, #A855F7, #E040FB);
    border-radius: 4px 4px 0 0;
    animation: growBar 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    transform-origin: bottom;
  }

  /* --- ANIMACIONES GENERALES --- */
  @keyframes deviceContentFade {
    from { opacity: 0; transform: translateY(6px); }
    to { opacity: 1; transform: translateY(0); }
  }
  @keyframes floatMarker {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-6px); }
  }
  @keyframes pulseMarker {
    0% { transform: scale(1); opacity: 0.5; }
    100% { transform: scale(1.4); opacity: 0; }
  }
  @keyframes growBar {
    from { transform: scaleY(0); }
    to { transform: scaleY(1); }
  }
  .animate-pulse-green {
    animation: pGreen 2s infinite;
  }
  @keyframes pGreen {
    0%, 100% { opacity: 0.8; }
    50% { opacity: 0.4; }
  }

  /* Resplandor Neon de fondo */
  .device-glow {
    position: absolute;
    width: 90%; height: 90%;
    top: 5%; left: 5%;
    background: radial-gradient(circle, rgba(0,230,118,0.06) 0%, transparent 70%);
    filter: blur(20px);
    z-index: 1;
    pointer-events: none;
  }

  /* --- Estilos exclusivos del Modal Flotante --- */
.glass-modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4); 
  backdrop-filter: blur(8px); 
  -webkit-backdrop-filter: blur(8px);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 99999; /* Asegura estar por encima de todo */
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}

.glass-modal-overlay.active {
  opacity: 1;
  pointer-events: auto;
}

.glass-modal-content {
  background: rgba(255, 255, 255, 0.12);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 16px;
  padding: 35px 25px;
  width: 90%;
  max-width: 340px;
  text-align: center;
  box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.25);
  position: relative;
  font-family: sans-serif; /* Se acoplará a la tipografía de tu web */
}

.glass-modal-content h4 {
  font-size: 20px;
  color: #ffffff;
  margin: 0 0 20px 0;
  font-weight: 600;
  letter-spacing: 0.5px;
}

.glass-modal-close {
  position: absolute;
  top: 12px;
  right: 16px;
  background: none;
  border: none;
  color: rgba(255, 255, 255, 0.6);
  font-size: 22px;
  cursor: pointer;
  line-height: 1;
}

.glass-modal-close:hover {
  color: #fff;
}

/* --- Botón WhatsApp Original --- */
.btn-whatsapp-send {
  background-color: #25D366;
  color: #ffffff;
  border: none;
  padding: 12px 32px;
  font-size: 16px;
  font-weight: 600;
  border-radius: 50px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
  transition: transform 0.2s ease, background-color 0.3s ease;
  width: 100%;
}

.btn-whatsapp-send:hover {
  background-color: #20ba5a;
  transform: translateY(-2px);
}

/* --- Ajustes del Contenido del Modal Profesional --- */
.glass-modal-content h4 {
  font-size: 22px;
  color: #ffffff;
  margin: 0 0 10px 0;
  font-weight: 600;
  letter-spacing: 0.5px;
}

.glass-modal-text {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.85);
  line-height: 1.5;
  margin: 0 0 25px 0;
  padding: 0 10px;
}

/* Forzar que las opciones del select sigan manteniendo el fondo predeterminado del sistema/página */
.form-select option {
  background-color: #141428 !important; 
  color: #fff !important;
}
  </style>
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

<!-- ============================
     SCRIPTS
============================ -->
<script>
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
</script>

</body>
</html>