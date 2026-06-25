<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E404 — Soluciones Digitales</title>
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
      width: 28px; height: 28px;
      border-radius: 50%;
      background: var(--wh-green);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.78rem; flex-shrink: 0;
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

    .wh-float-icon {
      position: absolute;
      background: rgba(12,12,22,0.92);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 0.55rem;
      font-size: 1.25rem;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    }

    .wh-icon-1 { top:18px; right:8px; animation:wfi1 5s ease-in-out infinite; }
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
      <img src="img/logo_glass_off.png" alt="E404" class="logo-img" />
    </a>

    <ul class="nav-links">
      <li><a href="#servicios">Servicios</a></li>
      <li><a href="#bots">Bots</a></li>
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
    <a href="#bots" class="mobile-nav-link">Bots de WhatsApp</a>
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
        Desarrollo · Marketing · Automatización
      </div>

      <h1>
        Construimos tu<br />
        presencia <span class="hl">digital</span><br />
        que <span class="hl2">convierte</span>
      </h1>

      <p class="hero-sub">
        Páginas web, sistemas a medida, bots de WhatsApp y marketing digital.
        Todo lo que tu empresa necesita para crecer, en un solo lugar.
      </p>

      <div class="hero-actions">
        <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
          Quiero mi proyecto <i class="fa-solid fa-arrow-right"></i>
        </button>
        <button class="btn-secondary" onclick="document.getElementById('servicios').scrollIntoView({behavior:'smooth'})">
          Ver servicios
        </button>
      </div>

      <div class="hero-trust">
        <div class="trust-avatars">
          <span>JR</span><span>MA</span><span>CP</span><span>LV</span>
        </div>
        <div class="trust-text">
          <strong>+80 clientes</strong> confían en nosotros
        </div>
      </div>
    </div>

    <!-- 3D Scene -->
    <div class="hero-right">
      <div class="hero-3d-scene">
        <div class="orbit-ring orbit-ring-3"></div>
        <div class="orbit-ring orbit-ring-2"></div>
        <div class="orbit-ring orbit-ring-1">
          <div class="orbit-dot"></div>
        </div>

        <div class="cube-wrapper">
          <div class="cube">
            <div class="cube-face face-front"><i class="fa-solid fa-laptop"></i></div>
            <div class="cube-face face-back"><i class="fa-solid fa-jet-fighter-up"></i></div>
            <div class="cube-face face-left"><i class="fa-solid fa-gear"></i></div>
            <div class="cube-face face-right"><i class="fa-solid fa-chart-line"></i></div>
            <div class="cube-face face-top"><i class="fa-solid fa-code-merge"></i></div>
            <div class="cube-face face-bottom"><i class="fa-solid fa-robot"></i></div>
          </div>
        </div>

        <div class="scene-platform"></div>

        <div class="float-card float-card-1">
          <div class="fc-dot"></div> Bot activo · 24/7
        </div>
        <div class="float-card float-card-2">
          <div class="fc-dot"></div> +100 mensajes/día
        </div>
        <div class="float-card float-card-3">
          <div class="fc-dot"></div> Entrega en 7 días
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
        <div class="card-icon">🌐</div>
        <h3>Páginas web profesionales</h3>
        <p>Landing pages, sitios corporativos y portafolios con diseño moderno, carga ultrarrápida y optimizados para convertir visitantes en clientes.</p>
        <span class="card-tag">Diseño · Frontend · SEO</span>
      </div>
      <div class="card reveal">
        <div class="card-icon">⚙️</div>
        <h3>Sistemas a medida</h3>
        <p>Plataformas, dashboards, CRMs y sistemas internos adaptados exactamente a tu flujo de trabajo y necesidades de negocio.</p>
        <span class="card-tag">Backend · Bases de datos</span>
      </div>
      <div class="card reveal">
        <div class="card-icon">🤖</div>
        <h3>Bots de WhatsApp</h3>
        <p>Automatiza atención al cliente, ventas y seguimientos con bots inteligentes que trabajan 24/7 conectados a tu negocio.</p>
        <span class="card-tag">Automatización · IA</span>
      </div>
      <div class="card reveal">
        <div class="card-icon">📈</div>
        <h3>Marketing digital</h3>
        <p>Estrategias de redes sociales, publicidad pagada y posicionamiento SEO que atraen clientes reales y miden resultados.</p>
        <span class="card-tag">SEO · Ads · Social media</span>
      </div>
      <div class="card reveal">
        <div class="card-icon">🛒</div>
        <h3>Tiendas en línea</h3>
        <p>E-commerce completo con pasarela de pagos, gestión de inventario, panel administrativo y experiencia de compra fluida.</p>
        <span class="card-tag">E-commerce · Pagos</span>
      </div>
      <div class="card reveal">
        <div class="card-icon">🔗</div>
        <h3>Integraciones y APIs</h3>
        <p>Conectamos tus herramientas existentes: ERP, CRM, pasarelas de pago, redes sociales y servicios externos.</p>
        <span class="card-tag">API · Integración</span>
      </div>
    </div>
  </section>

  <!-- ============================
       BOTS SECTION
  ============================ -->
  <section class="bots-section" id="bots">
    <div class="bots-inner">
      <div>
        <div class="section-label">Bots de WhatsApp</div>
        <h2 class="section-title">Tu asistente<br />que nunca duerme</h2>
        <p style="color:var(--muted);line-height:1.75;margin-bottom:0;font-size:1rem;">
          Nuestros bots responden al instante, envían catálogos, agendan citas y procesan pedidos —
          de forma automática, integrado a tu negocio. Sin contratar más personal.
        </p>

        <div class="bots-features">
          <div class="bot-feature">
            <div class="bot-feature-icon"><i class="fa-solid fa-check"></i></div>
            Respuestas automáticas en menos de 1 segundo
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon"><i class="fa-solid fa-check"></i></div>
            Integración con tu catálogo, agenda y CRM
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon"><i class="fa-solid fa-check"></i></div>
            Campañas masivas de mensajes y seguimientos
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon"><i class="fa-solid fa-check"></i></div>
            Panel de control para ver conversaciones en tiempo real
          </div>
        </div>

        <div style="margin-top:2rem;">
          <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
            Quiero mi bot de WhatsApp <i class="fa-brands fa-whatsapp"></i>
          </button>
        </div>
      </div>

      <!-- 3D Phone -->
      <div class="bots-right">
        <div class="wh-scene">
          <div class="wh-phone">
            <div class="phone-body">
              <div class="phone-screen">
                <div class="phone-header">
                  <div class="phone-avatar">🤖</div>
                  <div>
                    <div class="phone-name">Bot E404</div>
                    <div class="phone-status">● En línea</div>
                  </div>
                </div>
                <div class="phone-chat">
                  <div class="chat-bubble bubble-in">Hola, ¿cuánto cuesta una página web?</div>
                  <div class="chat-bubble bubble-out">¡Hola! 👋 Tenemos planes desde S/.299. ¿Te envío el catálogo? 📄</div>
                  <div class="chat-bubble bubble-in">Sí por favor</div>
                  <div class="chat-bubble bubble-out">¡Listo! 🚀 ¿Tienes 5 min para una llamada hoy?</div>
                  <div class="bubble-typing">
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                    <div class="typing-dot"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="phone-glow"></div>
          <div class="wh-float-icon wh-icon-1">💬</div>
          <div class="wh-float-icon wh-icon-2">📲</div>
          <div class="wh-float-icon wh-icon-3">⚡</div>
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
          <a class="social-btn ig" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-instagram"></i> Instagram
          </a>
          <a class="social-btn fb" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-facebook"></i> Facebook
          </a>
          <a class="social-btn tk" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-tiktok"></i> TikTok
          </a>
          <a class="social-btn li" href="#" target="_blank" rel="noopener">
            <i class="fa-brands fa-linkedin"></i> LinkedIn
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
            <input class="form-input" id="fphone" type="tel" placeholder="+51 999 999 999" autocomplete="tel" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="femail">Correo electrónico</label>
          <input class="form-input" id="femail" type="email" placeholder="tu@correo.com" autocomplete="email" />
        </div>

        <div class="form-group">
          <label class="form-label" for="fservice">¿Qué necesitas?</label>
          <select class="form-select" id="fservice">
            <option value="" disabled selected>Selecciona un servicio</option>
            <option>Página web</option>
            <option>Sistema o plataforma</option>
            <option>Bot de WhatsApp</option>
            <option>Marketing digital</option>
            <option>Tienda en línea</option>
            <option>Otro</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label" for="fmsg">Cuéntanos más (opcional)</label>
          <textarea class="form-textarea" id="fmsg" placeholder="Describe brevemente tu proyecto o idea..."></textarea>
        </div>

        <button class="form-submit" type="button">
          Enviar mensaje <i class="fa-solid fa-paper-plane"></i>
        </button>
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
    <img src="img/logo_glass_off.png" alt="E404" style="height:44px;width:auto;display:block;" />
</a>
      <p>Agencia digital especializada en desarrollo web, sistemas, automatización y marketing. Transformamos ideas en soluciones digitales que generan resultados reales.</p>
      <div class="footer-social">
        <a href="#" title="Instagram" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" title="Facebook" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" title="TikTok" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        <a href="#" title="LinkedIn" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
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
        <li><a href="#">Portafolio</a></li>
        <li><a href="#">Blog</a></li>
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
          <a href="mailto:contacto@e404.pe">
            <i class="fa-solid fa-envelope" style="color:var(--purple-light);"></i> contacto@e404.pe
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
    <p class="footer-copy">© 2025 E404 — Todos los derechos reservados</p>
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
</script>

</body>
</html>