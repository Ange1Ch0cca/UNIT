(function () {
  /* ========= Preloader ======== */
  const preloader = document.querySelectorAll('#preloader');

  window.addEventListener('load', function () {
    if (preloader.length) {
      document.getElementById('preloader').style.display = 'none';
    }
  });

  /* ========= Add Box Shadow in Header on Scroll ======== */
  window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    if (window.scrollY > 0) {
      header.style.boxShadow = '0px 0px 30px 0px rgba(200, 208, 216, 0.30)';
    } else {
      header.style.boxShadow = 'none';
    }
  });

  /* ========= sidebar toggle ======== */
  const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
  const mainWrapper = document.querySelector(".main-wrapper");
  const menuToggleButton = document.querySelector("#menu-toggle");
  const menuToggleButtonIcon = document.querySelector("#menu-toggle i");
  const overlay = document.querySelector(".overlay");

  menuToggleButton.addEventListener("click", () => {
    sidebarNavWrapper.classList.toggle("active");
    overlay.classList.add("active");
    mainWrapper.classList.toggle("active");

    // Cambiar icono MDI
    if (menuToggleButtonIcon.classList.contains("mdi-chevron-left")) {
      menuToggleButtonIcon.classList.remove("mdi-chevron-left");
      menuToggleButtonIcon.classList.add("mdi-menu");
    } else {
      menuToggleButtonIcon.classList.remove("mdi-menu");
      menuToggleButtonIcon.classList.add("mdi-chevron-left");
    }
  });

  overlay.addEventListener("click", () => {
    sidebarNavWrapper.classList.remove("active");
    overlay.classList.remove("active");
    mainWrapper.classList.remove("active");

    // Volver icono a flecha cuando cerramos con overlay
    menuToggleButtonIcon.classList.remove("mdi-menu");
    menuToggleButtonIcon.classList.add("mdi-chevron-left");
  });
})();
