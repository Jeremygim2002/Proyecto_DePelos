<?php
// Obtener la ruta actual de la página
$current_page = basename($_SERVER['REQUEST_URI']);
?>


<!------------------ SVG (Adecua cada navegador a nuestra web)---------------------->
<!-- ============================================================================ -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <defs>
    <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
      <path fill="currentColor" d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
      <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
      <path fill="currentColor"
        d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
      <path fill="currentColor"
        d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
      <path fill="currentColor"
        d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
    </symbol>

  </defs>
</svg>


<!-- Animacion de carga -->
<div class="preloader-wrapper">
  <div class="preloader">
  </div>
</div>



<!------------------------------ Header -------------------------------->
<!-- ================================================================ -->
<header>
  <!-- logo principal -->
  <div class="container py-2">
    <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

      <div class="col-sm-4 col-lg-3 text-center text-sm-start">
        <div class="main-logo">
          <a href="bienvenida.php">
            <img src="images/l1.png" alt="logo" class="img-fluid">
          </a>
        </div>
      </div>

      <!-- Datos de teléfono y gmail -->
      <div
        class="col-sm-8 col-lg-9 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
        <div class="support-box text-end d-none d-xl-block">
          <span class="fs-6 secondary-font text-muted">Teléfono</span>
          <h5 class="mb-0">999-999-999</h5>
        </div>
        <div class="support-box text-end d-none d-xl-block">
          <span class="fs-6 secondary-font text-muted">Email</span>
          <h5 class="mb-0">DePelos@gmail.com</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================================================= -->


  <!-- Linea bajo el Header 1 -->
  <div class="container-fluid">
    <hr class="m-0">
  </div>


  <!------------------------------- NavBar(MOBILE) ----------------------------->
  <!-- ====================================================================== -->
  <div class="container">
    <nav class="main-menu d-flex navbar navbar-expand-lg ">


      <!-- Parte IZQUIERDA (cuenta / favoritos / compras) -->
      <div class="d-flex d-lg-none align-items-end mt-3">
        <ul class="d-flex justify-content-end list-unstyled m-0">
          <li>
            <a href="php/cerrar_sesion.php" class="mx-3">
              <iconify-icon icon="uis:signout" class="fs-4"></iconify-icon>
            </a>
          </li>
          <li>
            <a href="deseos.php" class="mx-3">
              <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
            </a>
          </li>

          <!-- Numero e icono del carrito de compras -->
          <li>
            <a href="carrito.php" class="mx-3">
              <iconify-icon icon="mdi:cart" class="fs-4"></iconify-icon>
              <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                MOB
              </span>
            </a>
          </li>
        </ul>
      </div>
      <!-- ================================================================= -->



      <!-- Boton de despliegue(tres lineas) del navbar (MOBILE) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>



      <!----------------------- NavBar (COMPUTADOR) ------------------------->
      <!-- =============================================================== -->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <!-- Boton de X para el navbar cuando esta en modo mobile -->
        <div class="offcanvas-header justify-content-center">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body justify-content-between">
          <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
            <li class="nav-item">
              <a href="bienvenida.php"
                class="nav-link <?= ($current_page == 'bienvenida.php') ? 'active' : '' ?>">Home</a>
            </li>
            <li class="nav-item">
              <a href="nosotros.php"
                class="nav-link <?= ($current_page == 'nosotros.php') ? 'active' : '' ?>">Nosotros</a>
            </li>
            <li class="nav-item">
              <a href="adoptar.php"
                class="nav-link <?= ($current_page == 'adoptar.php') ? 'active' : '' ?>">Adoptar</a>
            </li>
            <li class="nav-item">
              <a href="comprar.php" class="nav-link <?= ($current_page == 'comprar.php') ? 'active' : '' ?>">Comprar</a>
            </li>
            <li class="nav-item">
              <a href="perdidos.php"
                class="nav-link <?= ($current_page == 'perdidos.php') ? 'active' : '' ?>">Perdidos</a>
            </li>
            <li class="nav-item">
              <a href="noticias.php"
                class="nav-link <?= ($current_page == 'noticias.php') ? 'active' : '' ?>">Noticias</a>
            </li>
            <li class="nav-item">
              <a href="contacto.php"
                class="nav-link <?= ($current_page == 'contacto.php') ? 'active' : '' ?>">Contacto</a>
            </li>
          </ul>

          <div class="d-none d-lg-flex align-items-end">
            <ul class="d-flex justify-content-end list-unstyled m-0">
              <li>
                <a href="php/cerrar_sesion.php" class="mx-3">
                  <iconify-icon icon="uis:signout" class="fs-4"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="deseos.php" class="mx-3">
                  <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                </a>
              </li>

              <!-- Numero e icono del carrito de compras -->
              <li class="">
                <a href="carrito.php" class="mx-3">
                  <iconify-icon icon="mdi:cart" class="fs-4"></iconify-icon>
                  <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                    COM
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- ================================================================= -->
    </nav>
  </div>
</header>