<!-- Sección del carrusel de imágenes de Instagram -->
<section id="insta" class="my-5">
    <div class="row g-0 py-5">
        <?php for ($i = 1; $i <= 6; $i++) : ?>
        <div class="col instagram-item text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a>
                <img src="images/insta_<?php echo $i; ?>.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <?php endfor; ?>
    </div>
</section>

<!-- Footer -->
<footer id="footer" class="my-5">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <div class="footer-menu">
                    <img src="images/l3.png" alt="logo">
                    <p class="blog-paragraph fs-6 mt-3">Adopta y haz que el mundo sea un lugar más amigable y peludo. Porque el
                        amor no tiene precio ¡pero sí tiene cola!</p>
                    <div class="social-links d-flex justify-content-center">
                        <ul class="d-flex list-unstyled gap-2">
                            <li class="social">
                                <a href="https://www.facebook.com/jeremigim.rosas/">
                                    <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                                </a>
                            </li>
                            <li class="social">
                                <a href="https://github.com/Jeremygim2002">
                                    <iconify-icon class="social-icon" icon="ri:github-fill"></iconify-icon>
                                </a>
                            </li>
                            <li class="social">
                                <a href="https://wa.me/928786676?text=Si puedes imaginarlo, puedes programarlo.">
                                    <iconify-icon class="social-icon" icon="ri:whatsapp-fill"></iconify-icon>
                                </a>
                            </li>
                            <li class="social">
                                <a href="https://www.instagram.com/jremygim/">
                                    <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                                </a>
                            </li>
                            <li class="social">
                                <a href="https://www.tiktok.com/@jremygim">
                                    <iconify-icon class="social-icon" icon="ri:tiktok-fill"></iconify-icon>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sección de Links rápidos -->
            <div class="col-md-3 d-flex justify-content-center">
                <div class="footer-menu">
                    <h3>Links rápidos</h3>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item"><a href="bienvenida.php" class="nav-link">Home</a></li>
                        <li class="menu-item"><a href="nosotros.php" class="nav-link">Nosotros</a></li>
                        <li class="menu-item"><a href="comprar.php" class="nav-link">Comprar</a></li>
                        <li class="menu-item"><a href="perdidos.php" class="nav-link">Perdidos</a></li>
                        <li class="menu-item"><a href="noticias.php" class="nav-link">Noticias</a></li>
                    </ul>
                </div>
            </div>

            <!-- Centro de Ayuda -->
            <div class="col-md-3 d-flex justify-content-center">
                <div class="footer-menu">
                    <h3>Centro de ayuda</h3>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
                    </ul>
                </div>
            </div>

            <!-- Sección de Suscripción -->
            <div class="col-md-3 d-flex justify-content-center">
                <div>
                    <h3>Suscribete</h3>
                    <p class="blog-paragraph fs-6">Solo así recibirás las últimas noticias y promociones para los pequeños de 4 patas.</p>
                    <div class="search-bar border rounded-pill border-dark-subtle px-2">
                        <form class="text-center d-flex align-items-center" action="" method="">
                            <input type="text" class="form-control border-0 bg-transparent" placeholder="Ingresa tu email" />
                            <iconify-icon class="send-icon" icon="tabler:location-filled"></iconify-icon>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Footer inferior -->
<div id="footer-bottom">
    <div class="container">
        <hr class="m-0">
        <div class="row mt-3">
            <div class="col-md-6 copyright">
                <p class="secondary-font">© 2024 DePelos. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>
