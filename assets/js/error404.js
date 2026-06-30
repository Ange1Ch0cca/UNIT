/* ==========================================================================
   MÓDULO AUTÓNOMO E INDEPENDIENTE: CONTROL DE MODAL 404 Y REDIRECCIÓN COMPLETA
   ========================================================================== */
(function() {
  // Lógica central encapsulada para protección de flujos del script
  function initSupportModal() {
    const modal = document.getElementById('supportModal');
    const btnOpen = document.getElementById('openSupportModal');
    const btnClose = document.getElementById('closeSupportModal');
    const btnWaSend = document.getElementById('sendWhatsappSupport');

    // Despachador para la apertura del Modal
    if (btnOpen && modal) {
      btnOpen.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        modal.classList.add('active');
      });
    }

    // Despachador para cierre por medio de la X
    if (btnClose && modal) {
      btnClose.addEventListener('click', (e) => {
        e.preventDefault();
        modal.classList.remove('active');
      });
    }

    // Despachador para cierre al cliquear sobre las zonas externas translúcidas
    if (modal) {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.remove('active');
        }
      });
    }

    // Modificación de ruta para el link del logo si se inicializa dentro del 404
    const logoLink = document.getElementById('logo-link');
    if (logoLink && window.location.pathname.includes('404')) {
      logoLink.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = "./";
      });
    }
  }

  // Evalúa el ciclo de vida de la página web para disparar la carga sin colisiones
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSupportModal);
  } else {
    initSupportModal();
  }
})();
