<?php
// Incluir el
include 'php/enviar_contacto.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!------------------ Metadatos ---------------------->
  <!-- ============================================= -->
  <meta charset="UTF-8">
  <meta name="author" content="jremygim">
  <meta name="description"
    content="Proyecto para adopción de mascotas. Adémas, consejos y venta de productos para los mismos">
  <meta name="keywords"
    content="Adopción de mascotas, Venta de productos, Perros, Gatos, Consejos para cuidar mascotas, Salud de mascotas, Juguetes para mascotas, Alimentos para mascotas">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Los numeros de teléfono no se conviertan en enlaces -->
  <meta name="format-detection" content="telephone=no">
  <!-- La web se pueda ejecutar en pantalla completa (IOS) -->
<meta name="mobile-web-app-capable" content="yes">


  <!------------------ Titulo ---------------------->
  <!-- ============================================= -->
  <title>DePelos | Contacto</title>


  <!------------------ Favicon ---------------------->
  <!-- ============================================= -->
  <link type="image/png" sizes="96x96" rel="icon" href="/images/icon/icon_2.png">


  <!------------------ Estilos de letra ---------------------->
  <!-- ==================================================== -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Chilanka&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap"
    rel="stylesheet">


  <!------------------ Estilos CSS ---------------------->
  <!-- =============================================== -->
  <link rel="stylesheet" href="css/swiper.css" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="css/vendor.css">
  <link rel="stylesheet" type="text/css" href="style2.css">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">


  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

</head>

<body>



<?php include 'header_includes.php'; ?>





  <!-------------------------------- Seccion 1 (Título)-------------------------------->
  <!-- ============================================================================= -->

  <section id="banner" class="py-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="hero-content py-5 my-3">
        <h2 class="display-1 mt-3 mb-0">Contáctanos</h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Contacto</span>
        </nav>
      </div>
    </div>
  </section>




  <!-------------------------------- Seccion 2 (Cuerpo)-------------------------------->
  <!-- ============================================================================= -->
  <section class="contact-us">
    <div class="container py-5 my-5">
        <div class="row">
            <div class="contact-info col-lg-6 pb-3">
                <h2 class="text-dark">Información de contacto</h2>
                <p>No dudes en ponerte en contacto si deseas publicar avisos sobre tu mascota perdida o en adopción</p>
                <div class="page-content d-flex flex-wrap mt-5">
                    <!-- Información de contacto -->
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box text-dark pe-4 mb-5">
                            <h4 class="card-title">Números</h4>
                            <div class="contact-number pt-3">
                                <p><a>999-999-999</a></p>
                            </div>
                            <div class="contact-number">
                                <p><a>888-888-888</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-box">
                            <h4 class="card-title">Dirección</h4>
                            <div class="contact-address pt-3">
                                <p>Universidad César Vallejo</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inquiry-item col-lg-6">
                <div class="rounded-5">
                    <h2 class="text-dark">Ponte en contacto</h2>
                    <p>Completa el formulario y envíanos un mensaje.</p>

                    <!-- Formulario de contacto -->
                    <form id="contact-form" action="php/enviar_contacto.php" method="POST" class="form-group flex-wrap">
                    <select name="asunto" class="form-select form-control mt-2 mb-4" required>
                                <option value="Perdida">Perdida</option>
                                <option value="Adopcion">Adopcion</option>
                            </select>
                        <div class="form-input col-lg-12 d-flex mb-3">
                            <input type="nombremascota" name="nombremascota" placeholder="Nombre de la mascota" class="form-control ps-3 me-3" required>
                            <input type="text" name="celular" placeholder="Celular" class="form-control ps-3" required>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <textarea name="mensaje" placeholder="Mensaje" class="form-control ps-3" style="height:150px;" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="contact-submit" id="submit-button" class="btn btn-dark btn-lg rounded-1">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




  <?php include 'footer_insta.php'; ?>



  <script>
document.addEventListener('DOMContentLoaded', function () {
    // Obtener parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');
    const message = urlParams.get('message');

    if (status === 'success') {
        Swal.fire({
            title: '¡Éxito!',
            text: 'El mensaje ha sido enviado correctamente.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Remover los parámetros de la URL
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    } else if (status === 'error') {
        Swal.fire({
            title: 'Error',
            text: decodeURIComponent(message),
            icon: 'error',
            confirmButtonText: 'OK'
        }).then(() => {
            // Remover los parámetros de la URL
            window.history.replaceState({}, document.title, window.location.pathname);
        });
    }
});
</script>


  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/swiper.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script2.js"></script>
  <script src="js/iconify.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

</body>

</html>