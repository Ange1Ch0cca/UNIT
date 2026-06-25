<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E404 — Soluciones Digitales</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
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
    }

    html { scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      line-height: 1.6;
      overflow-x: hidden;
      cursor: none;
    }

    a { text-decoration: none; color: inherit; }
    button { cursor: none; }

    /* ============================
       CURSOR LIGHT
    ============================ */
    #cursor-dot {
      position: fixed;
      top: 0; left: 0;
      width: 10px; height: 10px;
      background: var(--purple-glow);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.08s ease, background 0.2s;
      box-shadow: 0 0 8px 2px var(--purple-light);
    }

    #cursor-glow {
      position: fixed;
      top: 0; left: 0;
      width: 340px; height: 340px;
      background: radial-gradient(circle, rgba(124,58,237,0.12) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9998;
      transform: translate(-50%, -50%);
      transition: transform 0.18s ease;
    }

    #cursor-ring {
      position: fixed;
      top: 0; left: 0;
      width: 36px; height: 36px;
      border: 1.5px solid rgba(168,85,247,0.55);
      border-radius: 50%;
      pointer-events: none;
      z-index: 9999;
      transform: translate(-50%, -50%);
      transition: transform 0.14s ease, width 0.2s, height 0.2s, border-color 0.2s;
    }

    body:has(a:hover) #cursor-ring,
    body:has(button:hover) #cursor-ring {
      width: 52px; height: 52px;
      border-color: var(--purple-light);
    }

    /* ============================
       NAVBAR
    ============================ */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1.1rem 3rem;
      border-bottom: 1px solid var(--border);
      background: rgba(8,8,15,0.88);
      position: sticky;
      top: 0;
      z-index: 500;
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
    }

    .logo {
      font-family: 'Syne', sans-serif;
      font-size: 1.35rem;
      font-weight: 800;
      color: var(--text);
      letter-spacing: -0.02em;
      display: flex;
      align-items: center;
      gap: 0.4rem;
    }

    .logo span { color: var(--purple-light); }

    .logo-icon {
      width: 30px; height: 30px;
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.9rem;
    }

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

    .nav-right { display: flex; align-items: center; gap: 1rem; }

    .nav-whatsapp {
      display: flex; align-items: center; gap: 0.4rem;
      color: var(--wh-green);
      font-size: 0.8rem;
      font-weight: 600;
      border: 1px solid rgba(37,211,102,0.3);
      border-radius: 8px;
      padding: 0.45rem 0.9rem;
      transition: background 0.2s;
    }

    .nav-whatsapp:hover { background: rgba(37,211,102,0.08); }

    .nav-cta {
      background: var(--purple);
      color: #fff;
      padding: 0.5rem 1.3rem;
      border-radius: 9px;
      font-size: 0.875rem;
      font-weight: 600;
      border: none;
      font-family: 'Inter', sans-serif;
      transition: background 0.2s, transform 0.1s;
    }

    .nav-cta:hover { background: var(--purple-light); transform: translateY(-1px); }

    /* ============================
       HERO
    ============================ */
    .hero {
      min-height: calc(100vh - 60px);
      display: grid;
      grid-template-columns: 1fr 1fr;
      align-items: center;
      gap: 3rem;
      padding: 3rem 3rem 3rem;
      position: relative;
      overflow: hidden;
    }

    .orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(90px);
      pointer-events: none;
      opacity: 0.3;
      z-index: 0;
    }

    .orb-1 { width: 550px; height: 550px; background: #4c1d95; top: -150px; left: -80px; }
    .orb-2 { width: 350px; height: 350px; background: #1d4ed8; bottom: -80px; right: 10%; }
    .orb-3 { width: 200px; height: 200px; background: var(--purple); top: 50%; right: 5%; opacity: 0.15; }

    .hero-left { position: relative; z-index: 1; }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: rgba(124,58,237,0.14);
      border: 1px solid rgba(124,58,237,0.4);
      border-radius: 999px;
      padding: 0.4rem 1rem;
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

    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.35} }

    .hero h1 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2.6rem, 4vw, 3.8rem);
      font-weight: 800;
      line-height: 1.08;
      letter-spacing: -0.03em;
      margin-bottom: 1.4rem;
    }

    .hero h1 .hl { color: var(--purple-light); }
    .hero h1 .hl2 { color: var(--green); }

    .hero-sub {
      color: var(--muted);
      font-size: 1.05rem;
      line-height: 1.75;
      margin-bottom: 2.25rem;
      max-width: 480px;
    }

    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 2.5rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      color: #fff;
      padding: 0.78rem 1.75rem;
      border-radius: 10px;
      font-weight: 600;
      font-size: 0.92rem;
      border: none;
      font-family: 'Inter', sans-serif;
      transition: opacity 0.2s, transform 0.15s;
      box-shadow: 0 4px 24px rgba(124,58,237,0.35);
    }

    .btn-primary:hover { opacity: 0.92; transform: translateY(-2px); }

    .btn-secondary {
      background: transparent;
      color: var(--text);
      padding: 0.78rem 1.75rem;
      border-radius: 10px;
      font-weight: 500;
      font-size: 0.92rem;
      border: 1px solid var(--border);
      font-family: 'Inter', sans-serif;
      transition: border-color 0.2s, background 0.2s;
    }

    .btn-secondary:hover { border-color: var(--purple); background: rgba(124,58,237,0.07); }

    .hero-trust {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .trust-avatars {
      display: flex;
    }

    .trust-avatars span {
      width: 32px; height: 32px;
      border-radius: 50%;
      border: 2px solid var(--bg);
      background: linear-gradient(135deg, var(--purple), var(--purple-light));
      display: flex; align-items: center; justify-content: center;
      font-size: 0.7rem;
      font-weight: 700;
      margin-left: -8px;
    }

    .trust-avatars span:first-child { margin-left: 0; }

    .trust-text { color: var(--muted); font-size: 0.82rem; }
    .trust-text strong { color: var(--text); }

    /* HERO RIGHT - 3D Illustration */
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

    /* Floating platform */
    .scene-platform {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      width: 240px;
      height: 20px;
      background: linear-gradient(180deg, rgba(124,58,237,0.4), transparent);
      border-radius: 50%;
      filter: blur(8px);
      animation: platformPulse 3s ease-in-out infinite;
    }

    @keyframes platformPulse {
      0%,100%{ opacity:0.6; transform: translateX(-50%) scaleX(1); }
      50%{ opacity:0.9; transform: translateX(-50%) scaleX(1.08); }
    }

    /* Main rotating cube */
    .cube-wrapper {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -55%);
      animation: floatUpDown 4s ease-in-out infinite;
    }

    @keyframes floatUpDown {
      0%,100%{ transform: translate(-50%, -55%); }
      50%{ transform: translate(-50%, -62%); }
    }

    .cube {
      width: 130px;
      height: 130px;
      position: relative;
      transform-style: preserve-3d;
      animation: rotateCube 12s linear infinite;
    }

    @keyframes rotateCube {
      from { transform: rotateX(20deg) rotateY(0deg); }
      to   { transform: rotateX(20deg) rotateY(360deg); }
    }

    .cube-face {
      position: absolute;
      width: 130px;
      height: 130px;
      border-radius: 16px;
      border: 1px solid rgba(168,85,247,0.5);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2.5rem;
      backface-visibility: hidden;
    }

    .face-front  { background: linear-gradient(135deg,rgba(124,58,237,0.7),rgba(168,85,247,0.5)); transform: translateZ(65px); }
    .face-back   { background: linear-gradient(135deg,rgba(30,30,60,0.9),rgba(60,20,120,0.7));   transform: rotateY(180deg) translateZ(65px); }
    .face-left   { background: linear-gradient(135deg,rgba(80,20,160,0.7),rgba(30,30,80,0.8));   transform: rotateY(-90deg) translateZ(65px); }
    .face-right  { background: linear-gradient(135deg,rgba(100,30,180,0.6),rgba(50,10,100,0.8)); transform: rotateY(90deg) translateZ(65px); }
    .face-top    { background: linear-gradient(135deg,rgba(168,85,247,0.8),rgba(124,58,237,0.6)); transform: rotateX(90deg) translateZ(65px); }
    .face-bottom { background: linear-gradient(135deg,rgba(20,20,40,0.9),rgba(60,20,120,0.5));   transform: rotateX(-90deg) translateZ(65px); }

    /* Orbiting rings */
    .orbit-ring {
      position: absolute;
      top: 50%; left: 50%;
      border-radius: 50%;
      border: 1px solid rgba(168,85,247,0.25);
      transform: translate(-50%, -50%);
    }

    .orbit-ring-1 {
      width: 220px; height: 220px;
      animation: orbitSpin 8s linear infinite;
    }

    .orbit-ring-2 {
      width: 300px; height: 300px;
      border-color: rgba(124,58,237,0.15);
      animation: orbitSpin 14s linear infinite reverse;
    }

    .orbit-ring-3 {
      width: 360px; height: 360px;
      border-color: rgba(168,85,247,0.08);
      animation: orbitSpin 20s linear infinite;
    }

    @keyframes orbitSpin {
      from { transform: translate(-50%, -50%) rotateX(75deg) rotateZ(0deg); }
      to   { transform: translate(-50%, -50%) rotateX(75deg) rotateZ(360deg); }
    }

    .orbit-dot {
      position: absolute;
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--purple-light);
      top: -4px; left: 50%;
      margin-left: -4px;
      box-shadow: 0 0 8px var(--purple-light);
    }

    /* Floating mini cards */
    .float-card {
      position: absolute;
      background: rgba(15,15,26,0.9);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 0.6rem 0.9rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.75rem;
      font-weight: 600;
      backdrop-filter: blur(8px);
      white-space: nowrap;
      box-shadow: 0 8px 32px rgba(0,0,0,0.4);
    }

    .float-card-1 {
      top: 30px; right: 0px;
      animation: floatCard1 5s ease-in-out infinite;
      color: var(--green);
      border-color: rgba(34,197,94,0.25);
    }

    .float-card-2 {
      bottom: 80px; left: -10px;
      animation: floatCard2 6s ease-in-out infinite;
      color: var(--purple-glow);
    }

    .float-card-3 {
      bottom: 160px; right: -10px;
      animation: floatCard3 4.5s ease-in-out infinite;
      color: #60a5fa;
      border-color: rgba(96,165,250,0.25);
    }

    @keyframes floatCard1 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
    @keyframes floatCard2 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(8px)} }
    @keyframes floatCard3 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-6px)} }

    .fc-dot { width: 8px; height: 8px; border-radius: 50%; background: currentColor; }

    /* ============================
       STATS STRIP
    ============================ */
    .stats-strip {
      margin: 0 3rem;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 2.25rem 3rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1.5rem;
      align-items: center;
      justify-content: space-around;
    }

    .stat-item { text-align: center; }

    .stat-num {
      font-family: 'Syne', sans-serif;
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--text);
      line-height: 1;
    }

    .stat-num em { color: var(--purple-light); font-style: normal; }
    .stat-lbl { color: var(--muted); font-size: 0.82rem; margin-top: 0.35rem; }
    .stat-divider { width: 1px; height: 52px; background: var(--border); }

    /* ============================
       SERVICES
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
      margin-bottom: 0.65rem;
    }

    .section-title {
      font-family: 'Syne', sans-serif;
      font-size: clamp(1.9rem, 3vw, 2.6rem);
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
      transition: border-color 0.3s, transform 0.2s, box-shadow 0.3s;
      position: relative;
      overflow: hidden;
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(168,85,247,0.5), transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .card:hover { border-color: rgba(124,58,237,0.45); transform: translateY(-3px); box-shadow: 0 12px 40px rgba(124,58,237,0.12); }
    .card:hover::before { opacity: 1; }

    .card-icon {
      width: 46px; height: 46px;
      border-radius: 11px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 1.2rem;
      font-size: 1.4rem;
      background: rgba(124,58,237,0.14);
      border: 1px solid rgba(124,58,237,0.25);
    }

    .card h3 {
      font-family: 'Syne', sans-serif;
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 0.45rem;
    }

    .card p { color: var(--muted); font-size: 0.865rem; line-height: 1.65; }

    .card-tag {
      display: inline-block;
      margin-top: 1rem;
      font-size: 0.73rem;
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
      gap: 5rem;
      align-items: center;
    }

    .bots-right {
      position: relative;
      height: 420px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* WhatsApp 3D Phone */
    .wh-scene {
      position: relative;
      width: 260px;
      height: 380px;
    }

    .wh-phone {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%);
      width: 180px;
      animation: phoneFloat 4s ease-in-out infinite;
    }

    @keyframes phoneFloat {
      0%,100%{ transform: translate(-50%,-50%) rotateY(-12deg) rotateZ(-2deg); }
      50%{ transform: translate(-50%,-56%) rotateY(8deg) rotateZ(2deg); }
    }

    .phone-body {
      width: 160px;
      height: 260px;
      background: linear-gradient(160deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      border-radius: 28px;
      border: 2px solid rgba(168,85,247,0.3);
      box-shadow:
        0 40px 80px rgba(0,0,0,0.6),
        0 0 0 1px rgba(255,255,255,0.06),
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
      display: flex;
      align-items: center;
      gap: 8px;
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .phone-avatar {
      width: 28px; height: 28px;
      border-radius: 50%;
      background: var(--wh-green);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.8rem;
    }

    .phone-name { font-size: 0.7rem; font-weight: 600; color: #fff; }
    .phone-status { font-size: 0.58rem; color: rgba(255,255,255,0.6); }

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
      font-size: 0.6rem;
      line-height: 1.4;
      max-width: 85%;
    }

    .bubble-in {
      background: rgba(255,255,255,0.1);
      color: #fff;
      align-self: flex-start;
      border-bottom-left-radius: 3px;
      animation: bubbleIn 0.3s ease;
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
    }

    .typing-dot {
      width: 5px; height: 5px;
      border-radius: 50%;
      background: rgba(255,255,255,0.5);
    }

    .typing-dot:nth-child(1) { animation: typingBounce 1s ease-in-out 0s infinite; }
    .typing-dot:nth-child(2) { animation: typingBounce 1s ease-in-out 0.2s infinite; }
    .typing-dot:nth-child(3) { animation: typingBounce 1s ease-in-out 0.4s infinite; }

    @keyframes typingBounce {
      0%,60%,100%{ transform: translateY(0); }
      30%{ transform: translateY(-4px); }
    }

    /* Glow under phone */
    .phone-glow {
      position: absolute;
      bottom: 10px; left: 50%;
      transform: translateX(-50%);
      width: 120px; height: 30px;
      background: var(--wh-green);
      border-radius: 50%;
      filter: blur(20px);
      opacity: 0.25;
      animation: glowPulse 3s ease-in-out infinite;
    }

    @keyframes glowPulse { 0%,100%{opacity:0.2} 50%{opacity:0.4} }

    /* Floating icons around phone */
    .wh-float-icon {
      position: absolute;
      background: rgba(15,15,26,0.9);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 0.55rem;
      font-size: 1.3rem;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    }

    .wh-icon-1 { top: 20px; right: 10px; animation: wfloat1 5s ease-in-out infinite; }
    .wh-icon-2 { top: 50%; left: -10px; animation: wfloat2 6s ease-in-out infinite; }
    .wh-icon-3 { bottom: 40px; right: 0px; animation: wfloat3 4.5s ease-in-out infinite; }

    @keyframes wfloat1 { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-12px) rotate(5deg)} }
    @keyframes wfloat2 { 0%,100%{transform:translateY(0)} 50%{transform:translateY(10px)} }
    @keyframes wfloat3 { 0%,100%{transform:translateY(0) rotate(0deg)} 50%{transform:translateY(-8px) rotate(-5deg)} }

    .bots-features {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      margin-top: 2rem;
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
      background: rgba(34,197,94,0.12);
      border: 1px solid rgba(34,197,94,0.25);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.8rem;
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
      max-width: 580px;
      margin: 0 auto 3.5rem;
    }

    .process-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1.5rem;
      position: relative;
    }

    .process-grid::before {
      content: '';
      position: absolute;
      top: 28px; left: calc(12.5% + 14px); right: calc(12.5% + 14px);
      height: 1px;
      background: linear-gradient(90deg, var(--purple), var(--purple-light), var(--purple));
      opacity: 0.3;
    }

    .process-card {
      background: var(--surface);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 1.75rem 1.5rem;
      text-align: center;
      position: relative;
      transition: border-color 0.3s, transform 0.2s;
    }

    .process-card:hover { border-color: rgba(124,58,237,0.4); transform: translateY(-4px); }

    .process-num {
      width: 56px; height: 56px;
      border-radius: 50%;
      background: rgba(124,58,237,0.15);
      border: 1px solid rgba(124,58,237,0.35);
      display: flex; align-items: center; justify-content: center;
      margin: 0 auto 1.25rem;
      font-family: 'Syne', sans-serif;
      font-size: 1.1rem;
      font-weight: 800;
      color: var(--purple-light);
    }

    .process-card h4 {
      font-family: 'Syne', sans-serif;
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }

    .process-card p { color: var(--muted); font-size: 0.85rem; line-height: 1.6; }

    /* ============================
       CONTACT SECTION
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
      gap: 5rem;
      align-items: start;
    }

    .contact-left h2 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(2rem, 3vw, 2.8rem);
      font-weight: 800;
      letter-spacing: -0.025em;
      margin-bottom: 1rem;
      line-height: 1.1;
    }

    .contact-left p {
      color: var(--muted);
      font-size: 1rem;
      line-height: 1.75;
      margin-bottom: 2rem;
    }

    /* Big WhatsApp CTA */
    .wh-cta-big {
      display: flex;
      align-items: center;
      gap: 1rem;
      background: linear-gradient(135deg, rgba(37,211,102,0.15), rgba(37,211,102,0.05));
      border: 1px solid rgba(37,211,102,0.35);
      border-radius: 16px;
      padding: 1.25rem 1.5rem;
      margin-bottom: 1.25rem;
      transition: background 0.25s, transform 0.2s;
      position: relative;
      overflow: hidden;
    }

    .wh-cta-big::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(37,211,102,0.08), transparent);
      opacity: 0;
      transition: opacity 0.25s;
    }

    .wh-cta-big:hover { transform: translateY(-2px); }
    .wh-cta-big:hover::before { opacity: 1; }

    .wh-cta-icon {
      width: 52px; height: 52px;
      border-radius: 14px;
      background: var(--wh-green);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem;
      flex-shrink: 0;
      box-shadow: 0 8px 20px rgba(37,211,102,0.3);
    }

    .wh-cta-text { flex: 1; }
    .wh-cta-title { font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700; margin-bottom: 0.2rem; }
    .wh-cta-sub { color: var(--muted); font-size: 0.8rem; }

    .wh-cta-arrow {
      color: var(--wh-green);
      font-size: 1.2rem;
      transition: transform 0.2s;
    }

    .wh-cta-big:hover .wh-cta-arrow { transform: translateX(4px); }

    .social-row {
      display: flex;
      gap: 0.75rem;
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .social-btn {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 0.65rem 1.1rem;
      font-size: 0.82rem;
      font-weight: 600;
      color: var(--muted);
      transition: border-color 0.2s, color 0.2s, transform 0.2s;
      font-family: 'Inter', sans-serif;
    }

    .social-btn:hover { transform: translateY(-2px); }
    .social-btn.ig:hover { color: #e1306c; border-color: rgba(225,48,108,0.4); }
    .social-btn.fb:hover { color: #1877f2; border-color: rgba(24,119,242,0.4); }
    .social-btn.tk:hover { color: #fff; border-color: rgba(255,255,255,0.3); }
    .social-btn.li:hover { color: #0a66c2; border-color: rgba(10,102,194,0.4); }

    .contact-right {
      background: var(--surface2);
      border: 1px solid var(--border);
      border-radius: 20px;
      padding: 2rem;
    }

    .contact-right h3 {
      font-family: 'Syne', sans-serif;
      font-size: 1.15rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .form-group { margin-bottom: 1.1rem; }

    .form-label {
      display: block;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--muted);
      margin-bottom: 0.4rem;
    }

    .form-input, .form-textarea, .form-select {
      width: 100%;
      background: var(--bg);
      border: 1px solid var(--border);
      border-radius: 9px;
      padding: 0.7rem 1rem;
      color: var(--text);
      font-size: 0.875rem;
      font-family: 'Inter', sans-serif;
      outline: none;
      transition: border-color 0.2s;
    }

    .form-input::placeholder,
    .form-textarea::placeholder { color: rgba(139,138,168,0.6); }
    .form-input:focus, .form-textarea:focus, .form-select:focus { border-color: var(--purple); }

    .form-select { background: var(--bg); -webkit-appearance: none; appearance: none; }
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
    }

    .form-submit:hover { opacity: 0.9; transform: translateY(-1px); }

    /* ============================
       FOOTER
    ============================ */
    .footer {
      background: var(--bg);
      border-top: 1px solid var(--border);
    }

    .footer-top {
      display: grid;
      grid-template-columns: 1.5fr 1fr 1fr 1fr;
      gap: 3rem;
      padding: 3.5rem 3rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-brand .logo {
      margin-bottom: 1rem;
      font-size: 1.2rem;
    }

    .footer-brand p {
      color: var(--muted);
      font-size: 0.85rem;
      line-height: 1.7;
      margin-bottom: 1.5rem;
    }

    .footer-social {
      display: flex;
      gap: 0.6rem;
    }

    .footer-social a {
      width: 34px; height: 34px;
      border-radius: 8px;
      background: var(--surface);
      border: 1px solid var(--border);
      display: flex; align-items: center; justify-content: center;
      font-size: 0.9rem;
      transition: border-color 0.2s, background 0.2s;
    }

    .footer-social a:hover { border-color: var(--purple); background: rgba(124,58,237,0.12); }

    .footer-col h4 {
      font-family: 'Syne', sans-serif;
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 1.1rem;
      letter-spacing: 0.03em;
    }

    .footer-col ul { list-style: none; }
    .footer-col li { margin-bottom: 0.65rem; }
    .footer-col a {
      color: var(--muted);
      font-size: 0.83rem;
      transition: color 0.2s;
    }

    .footer-col a:hover { color: var(--purple-glow); }

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
      display: flex;
      align-items: center;
      gap: 0.4rem;
      background: rgba(124,58,237,0.1);
      border: 1px solid rgba(124,58,237,0.25);
      border-radius: 20px;
      padding: 0.3rem 0.8rem;
      font-size: 0.75rem;
      color: var(--purple-glow);
    }

    /* ============================
       RESPONSIVE
    ============================ */
    @media (max-width: 900px) {
      .hero { grid-template-columns: 1fr; min-height: auto; padding: 3rem 1.5rem; text-align: center; }
      .hero-right { height: 320px; }
      .hero-sub { margin: 0 auto 2rem; }
      .hero-actions { justify-content: center; }
      .hero-trust { justify-content: center; }

      .stats-strip { margin: 0 1.5rem; padding: 2rem 1.5rem; }
      .stat-divider { display: none; }

      .section-wrap { padding: 3.5rem 1.5rem; }
      .cards-grid { grid-template-columns: 1fr 1fr; }

      .bots-section { padding: 3.5rem 1.5rem; }
      .bots-inner { grid-template-columns: 1fr; gap: 3rem; }
      .bots-right { height: 300px; }

      .process-section { padding: 3.5rem 1.5rem; }
      .process-grid { grid-template-columns: 1fr 1fr; gap: 1rem; }
      .process-grid::before { display: none; }

      .contact-section { padding: 3.5rem 1.5rem; }
      .contact-inner { grid-template-columns: 1fr; gap: 3rem; }

      .footer-top { grid-template-columns: 1fr 1fr; gap: 2rem; padding: 2.5rem 1.5rem; }
      .footer-bottom { padding: 1.25rem 1.5rem; }
      .navbar { padding: 1rem 1.5rem; }
      .nav-links { display: none; }
      .nav-whatsapp span { display: none; }
    }

    @media (max-width: 560px) {
      .cards-grid { grid-template-columns: 1fr; }
      .process-grid { grid-template-columns: 1fr; }
      .footer-top { grid-template-columns: 1fr; }
      .form-row { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<!-- CURSOR -->
<div id="cursor-glow"></div>
<div id="cursor-ring"></div>
<div id="cursor-dot"></div>

<!-- ============================
     NAVBAR
============================ -->
<header>
  <nav class="navbar">
    <a href="#inicio" class="logo" id="logo-link">
      <img src="img/logo_glass_off.png" alt="E404" class="logo-img" style="height:50px;width:auto;display:block;">
    </a>
    <ul class="nav-links">
      <li><a href="#servicios">Servicios</a></li>
      <li><a href="#bots">Bots</a></li>
      <li><a href="#proceso">Proceso</a></li>
      <li><a href="#contacto">Contacto</a></li>
    </ul>
    <div class="nav-right">
      <a class="nav-whatsapp" href="https://wa.me/51906829934" target="_blank" style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(37,211,102,0.12);border:1px solid rgba(37,211,102,0.3);border-radius:8px;padding:0.5rem 0.9rem;color:#22c55e;font-weight:600;font-size:0.82rem;" rel="noopener">
        <i class="fa-brands fa-whatsapp"></i><span>WhatsApp</span>
      </a>
      <button class="nav-cta" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
        Empezar proyecto →
      </button>
    </div>
  </nav>
</header>

<main>

  <!-- ============================
       HERO
  ============================ -->
  <section class="hero" id="inicio">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Left -->
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
        Todo lo que tu empresa necesita para crecer en el mundo digital, en un solo lugar.
      </p>

      <div class="hero-actions">
        <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
          Quiero mi proyecto →
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

    <!-- Right - 3D Scene -->
    <div class="hero-right">
      <div class="hero-3d-scene">
        <!-- Rings -->
        <div class="orbit-ring orbit-ring-3"></div>
        <div class="orbit-ring orbit-ring-2"></div>
        <div class="orbit-ring orbit-ring-1">
          <div class="orbit-dot"></div>
        </div>

        <!-- Rotating Cube -->
        <div class="cube-wrapper">
          <div class="cube">
            <div class="cube-face face-front">💻</div>
            <div class="cube-face face-back">🚀</div>
            <div class="cube-face face-left">⚙️</div>
            <div class="cube-face face-right">📈</div>
            <div class="cube-face face-top">🤖</div>
            <div class="cube-face face-bottom">🔗</div>
          </div>
        </div>

        <!-- Platform shadow -->
        <div class="scene-platform"></div>

        <!-- Floating mini cards -->
        <div class="float-card float-card-1">
          <div class="fc-dot"></div>
          Bot activo · 24/7
        </div>
        <div class="float-card float-card-2">
          <div class="fc-dot"></div>
          +120 mensajes/día
        </div>
        <div class="float-card float-card-3" style="color:#60a5fa;border-color:rgba(96,165,250,0.25)">
          <div class="fc-dot"></div>
          Entrega en 5 días
        </div>
      </div>
    </div>
  </section>

  <!-- ============================
       STATS
  ============================ -->
  <div class="stats-strip">
    <div class="stat-item">
      <div class="stat-num">+<em>80</em></div>
      <div class="stat-lbl">Proyectos entregados</div>
    </div>
    <div class="stat-divider"></div>
    <div class="stat-item">
      <div class="stat-num"><em>5</em> días</div>
      <div class="stat-lbl">Tiempo promedio de entrega</div>
    </div>
    <div class="stat-divider"></div>
    <div class="stat-item">
      <div class="stat-num"><em>100</em>%</div>
      <div class="stat-lbl">Satisfacción garantizada</div>
    </div>
    <div class="stat-divider"></div>
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
      <div class="card">
        <div class="card-icon">🌐</div>
        <h3>Páginas web profesionales</h3>
        <p>Landing pages, sitios corporativos y portafolios con diseño moderno, carga ultrarrápida y optimizados para convertir visitantes en clientes.</p>
        <span class="card-tag">Diseño · Frontend · SEO</span>
      </div>

      <div class="card">
        <div class="card-icon">⚙️</div>
        <h3>Sistemas a medida</h3>
        <p>Plataformas, dashboards, CRMs y sistemas internos adaptados exactamente a tu flujo de trabajo y necesidades de negocio.</p>
        <span class="card-tag">Backend · Bases de datos</span>
      </div>

      <div class="card">
        <div class="card-icon">🤖</div>
        <h3>Bots de WhatsApp</h3>
        <p>Automatiza atención al cliente, ventas y seguimientos con bots inteligentes que trabajan 24/7 conectados a tu negocio.</p>
        <span class="card-tag">Automatización · IA</span>
      </div>

      <div class="card">
        <div class="card-icon">📈</div>
        <h3>Marketing digital</h3>
        <p>Estrategias de redes sociales, publicidad pagada y posicionamiento SEO que atraen clientes reales y miden resultados.</p>
        <span class="card-tag">SEO · Ads · Social media</span>
      </div>

      <div class="card">
        <div class="card-icon">🛒</div>
        <h3>Tiendas en línea</h3>
        <p>E-commerce completo con pasarela de pagos, gestión de inventario, panel administrativo y experiencia de compra fluida.</p>
        <span class="card-tag">E-commerce · Pagos</span>
      </div>

      <div class="card">
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
      <!-- Left text -->
      <div>
        <div class="section-label">Bots de WhatsApp</div>
        <h2 class="section-title">Tu asistente<br />que nunca duerme</h2>
        <p style="color:var(--muted);line-height:1.75;margin-bottom:1.75rem;font-size:1rem;">
          Nuestros bots responden al instante, envían catálogos, agendan citas y procesan pedidos — de forma automática, integrado a tu negocio. Sin contratar más personal.
        </p>

        <div class="bots-features">
          <div class="bot-feature">
            <div class="bot-feature-icon">✓</div>
            Respuestas automáticas en menos de 1 segundo
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon">✓</div>
            Integración con tu catálogo, agenda y CRM
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon">✓</div>
            Campañas masivas de mensajes y seguimientos
          </div>
          <div class="bot-feature">
            <div class="bot-feature-icon">✓</div>
            Panel de control para ver conversaciones en tiempo real
          </div>
        </div>

        <div style="margin-top:2rem;">
          <button class="btn-primary" onclick="document.getElementById('contacto').scrollIntoView({behavior:'smooth'})">
            Quiero mi bot de WhatsApp →
          </button>
        </div>
      </div>

      <!-- Right - 3D Phone -->
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
                  <div class="chat-bubble bubble-out">¡Listo! Te lo envío ahora 🚀 ¿Tienes 5 min para una llamada hoy?</div>
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

          <!-- Floating icons -->
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
      <p style="color:var(--muted);font-size:0.95rem;line-height:1.7;margin-top:0.75rem;">Sin burocracia ni sorpresas. Un proceso claro donde tú ves el avance en cada etapa.</p>
    </div>

    <div class="process-grid">
      <div class="process-card">
        <div class="process-num">1</div>
        <h4>Escuchamos tu idea</h4>
        <p>Reunión para entender tu negocio, objetivos y qué solución tiene más sentido para ti.</p>
      </div>
      <div class="process-card">
        <div class="process-num">2</div>
        <h4>Diseñamos la propuesta</h4>
        <p>Presentamos el alcance, tiempos y costo antes de empezar. Sin compromisos ocultos.</p>
      </div>
      <div class="process-card">
        <div class="process-num">3</div>
        <h4>Desarrollamos contigo</h4>
        <p>Te mostramos avances frecuentes para que puedas dar tu feedback en cada etapa.</p>
      </div>
      <div class="process-card">
        <div class="process-num">4</div>
        <h4>Lanzamos y te acompañamos</h4>
        <p>Publicamos tu proyecto y quedamos para soporte, ajustes y crecimiento futuro.</p>
      </div>
    </div>
  </section>

  <!-- ============================
       CONTACT SECTION
  ============================ -->
  <section class="contact-section" id="contacto">
    <div class="contact-inner">

      <!-- Left -->
      <div class="contact-left">
        <div class="section-label">Contacto</div>
        <h2>¿Listo para tu<br />proyecto digital?</h2>
        <p>
          Cuéntanos qué necesitas y te respondemos en menos de 2 horas.
          Preferimosel WhatsApp — es más directo y rápido para arrancar.
        </p>

        <!-- Big WhatsApp button -->
        <a class="wh-cta-big" href="https://wa.me/51906829934?text=Hola,%20quiero%20info%20sobre%20sus%20servicios" target="_blank" rel="noopener">
          <div class="wh-cta-icon"><i class="fa-brands fa-whatsapp"></i></div>
          <div class="wh-cta-text">
            <div class="wh-cta-title">Escríbenos por WhatsApp</div>
            <div class="wh-cta-sub">Respuesta inmediata · Lunes a Domingo</div>
          </div>
          <div class="wh-cta-arrow">→</div>
        </a>

        <p style="color:var(--muted);font-size:0.8rem;margin-bottom:1rem;margin-top:0.25rem;">O encuéntranos en nuestras redes:</p>

        <div class="social-row">
          <a class="social-btn ig" href="#" target="_blank"><i class="fa-brands fa-instagram" style="color:#E4405F;"></i> Instagram</a>
          <a class="social-btn fb" href="#" target="_blank"><i class="fa-brands fa-instagram" style="color:#1877F2;"></i> Facebook</a>
          <a class="social-btn tk" href="#" target="_blank"><i class="fa-brands fa-tiktok" style="color:#000000;"></i> TikTok</a>
          <a class="social-btn li" href="#" target="_blank">💼 LinkedIn</a>
        </div>

        <div style="background:var(--surface2);border:1px solid var(--border);border-radius:14px;padding:1.25rem;font-size:0.85rem;">
          <p style="color:var(--text);font-weight:600;margin-bottom:0.3rem;">📍 Atendemos a todo Perú y Latinoamérica</p>
          <p style="color:var(--muted);">Trabajamos 100% remoto. Nos adaptamos a tu zona horaria.</p>
        </div>
      </div>

      <!-- Right form -->
      <div class="contact-right">
        <h3>Cuéntanos tu proyecto</h3>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label">Nombre</label>
            <input class="form-input" type="text" placeholder="Tu nombre" />
          </div>
          <div class="form-group">
            <label class="form-label">WhatsApp</label>
            <input class="form-input" type="tel" placeholder="+51 999 999 999" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Correo electrónico</label>
          <input class="form-input" type="email" placeholder="tu@correo.com" />
        </div>

        <div class="form-group">
          <label class="form-label">¿Qué necesitas?</label>
          <select class="form-select form-input">
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
          <label class="form-label">Cuéntanos más (opcional)</label>
          <textarea class="form-textarea" placeholder="Describe brevemente tu proyecto o idea..."></textarea>
        </div>

        <button class="form-submit">Enviar mensaje →</button>
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
      <div class="logo" style="margin-bottom:1rem">
        <img src="img/logo_glass_off.png" alt="E404" class="logo-img" style="height:50px;width:auto;display:block;">
      </div>
      <p>Agencia digital especializada en desarrollo web, sistemas, automatización y marketing. Transformamos ideas en soluciones digitales que generan resultados.</p>
      <div class="footer-social">
        <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
        <a href="#" title="Facebook"><i class="fa-brands fa-facebook"></i></a>
        <a href="#" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
        <a href="#" title="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://wa.me/51906829934" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
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
        <li><a href="https://wa.me/51906829934" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a></li>
        <li><a href="mailto:contacto@e404.pe"><i class="fa-solid fa-envelope"></i> contacto@e404.pe</a></li>
        <li><a href="#"><i class="fa-solid fa-map-pin"></i> Perú · Remoto</a></li>
        <li style="margin-top:1rem">
          <a href="https://wa.me/51906829934" target="_blank"
             style="display:inline-flex;align-items:center;gap:0.4rem;background:rgba(37,211,102,0.12);border:1px solid rgba(37,211,102,0.3);border-radius:8px;padding:0.5rem 0.9rem;color:#22c55e;font-weight:600;font-size:0.82rem;">
            <i class="fa-brands fa-whatsapp"></i> Escribir ahora
          </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <p class="footer-copy">© 2025 E404 — Todos los derechos reservados</p>
    <div class="footer-badge">
      <span class="badge-dot" style="width:5px;height:5px;"></span>
      Disponibles para nuevos proyectos
    </div>
    <p class="footer-copy">Hecho con 💜 en Perú</p>
  </div>
</footer>

<!-- ============================
     SCRIPTS
============================ -->
<script>
  // Cursor tracking
  const dot   = document.getElementById('cursor-dot');
  const ring  = document.getElementById('cursor-ring');
  const glow  = document.getElementById('cursor-glow');

  let mx = 0, my = 0;
  let rx = 0, ry = 0;
  let gx = 0, gy = 0;

  document.addEventListener('mousemove', e => {
    mx = e.clientX;
    my = e.clientY;
  });

  function animateCursor() {
    // Dot follows instantly
    dot.style.left  = mx + 'px';
    dot.style.top   = my + 'px';

    // Ring lerp
    rx += (mx - rx) * 0.14;
    ry += (my - ry) * 0.14;
    ring.style.left = rx + 'px';
    ring.style.top  = ry + 'px';

    // Glow lerp (slower)
    gx += (mx - gx) * 0.07;
    gy += (my - gy) * 0.07;
    glow.style.left = gx + 'px';
    glow.style.top  = gy + 'px';

    requestAnimationFrame(animateCursor);
  }

  animateCursor();

  // Hide cursor when leaving window
  document.addEventListener('mouseleave', () => {
    dot.style.opacity = '0';
    ring.style.opacity = '0';
  });
  document.addEventListener('mouseenter', () => {
    dot.style.opacity = '1';
    ring.style.opacity = '1';
  });

  // Shrink dot on click
  document.addEventListener('mousedown', () => {
    dot.style.transform = 'translate(-50%,-50%) scale(0.6)';
    ring.style.transform = 'translate(-50%,-50%) scale(0.85)';
  });
  document.addEventListener('mouseup', () => {
    dot.style.transform = 'translate(-50%,-50%) scale(1)';
    ring.style.transform = 'translate(-50%,-50%) scale(1)';
  });

  // Logo goes to top
  document.getElementById('logo-link').addEventListener('click', e => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // Scroll-triggered card animations
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.card, .process-card').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease, border-color 0.3s, box-shadow 0.3s';
    observer.observe(el);
  });
</script>

</body>
</html>