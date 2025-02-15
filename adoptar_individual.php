

<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo "<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Debe iniciar sesión para poder adoptar una mascota.',
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = 'index.php'; // Redirigir a la página de inicio de sesión
    });
    </script>";
    exit;
}

// Incluir el archivo para obtener los datos de la mascota
include 'php/datos_mascota.php';

// Obtener el ID de la mascota de la URL o formulario
$id_mascota = isset($_GET['id']) ? intval($_GET['id']) : 1; // Por defecto, usa id 1 si no se proporciona

// Obtener los datos de la mascota utilizando la función del archivo incluido
$mascota = obtenerDatosMascota($id_mascota);

// Asignar datos de la mascota a variables
$nombre = $mascota['nombre'];
$edad = $mascota['edad'];
$descripcion = $mascota['descripcion'];
$pelaje = $mascota['pelaje'];
$tamano = $mascota['tamano'];
$disponibilidad = $mascota['disponibilidad'] ? "Disponible para adoptar" : "No disponible para adoptar";
$comportamiento = $mascota['comportamiento'];
$compatibilidad = $mascota['compatibilidad'];
$categoria = $mascota['tipo'];
$comprar = $mascota['comprar'];

// Imagen principal de la mascota
$imagen_grande = 'images/' . $mascota['imagen_grande'];

// Imágenes adicionales
$imagenes_pequenas = [
    'images/' . $mascota['imagen1'],
    'images/' . $mascota['imagen2'],
    'images/' . $mascota['imagen3']
];
?>



<!DOCTYPE html>
<html lang="es">

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
    <title>DePelos | Adoptar</title>


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



    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

</head>

<>

   

<?php include 'header_includes.php'; ?>





    <!-------------------------------- Seccion 1 (Título) -------------------------------->
    <!-- ============================================================================== -->
    <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-5 my-3">
                <h2 class="display-1 mt-3 mb-0">Adopta a <span class="text-primary"><?php echo htmlspecialchars($nombre); ?></span></h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
                    <span class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($nombre); ?></span>
                </nav>
            </div>
        </div>
    </section>





    <!-------------------------------- Seccion 2 (Como fue encontrado) -------------------------------->
    <!-- ========================================================================================== -->
    <section id="selling-product">
    <div class="container my-md-5 py-5">
        <div class="row g-md-5">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Imagen grande -->
                        <div class="swiper product-large-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?php echo $imagen_grande; ?>" class="img-fluid" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <!-- Imágenes pequeñas -->
                        <div thumbsSlider="" class="swiper product-thumbnail-slider">
                            <div class="swiper-wrapper">
                                <?php foreach ($imagenes_pequenas as $img): ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $img; ?>" class="img-fluid" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Datos de la mascota -->
            <div class="col-lg-6 mt-5">
                <div class="product-info">
                    <div class="element-header">
                        <h2 itemprop="name" class="display-6"><?php echo htmlspecialchars($nombre); ?></h2>
                    </div>
                    <div class="product-price pt-3 pb-3">
                        <strong class="text-primary display-6 fw-bold"><?php echo htmlspecialchars($edad); ?> meses</strong>
                    </div>
                    <p><?php echo htmlspecialchars($descripcion); ?></p>
                    <div class="cart-wrap">
                        <div class="color-options product-select">
                            <div class="color-toggle pt-2">
                                <h6 class="item-title fw-bold">Pelaje</h6>
                                <ul class="select-list list-unstyled d-flex">
                                    <li class="select-item pe-3"><a><?php echo htmlspecialchars($pelaje); ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="swatch product-select pt-3">
                            <h6 class="item-title fw-bold">Tamaño:</h6>
                            <ul class="select-list list-unstyled d-flex">
                                <li class="select-item pe-3"><a><?php echo htmlspecialchars($tamano); ?></a></li>
                            </ul>
                        </div>
                        <a href="#form"><div class="product-quantity pt-2">
                            <div class="d-flex flex-wrap pt-4">
                            <button id="btnDisponibilidad" onclick="enviarFormulario(event)" class="btn-cart me-3 px-4 pt-3 pb-3 btn btn-dark text-uppercase w-100">
           <?php echo $disponibilidad; ?>
        </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="meta-product pt-4">
                    <div class="meta-item d-flex align-items-baseline">
                        <h6 class="item-title fw-bold no-margin pe-2">Categoría:</h6>
                        <ul class="select-list list-unstyled d-flex">
                            <li class="select-item"><?php echo htmlspecialchars($categoria); ?></li>
                        </ul>
                    </div>
                    <div class="meta-item d-flex align-items-baseline">
                        <h6 class="item-title fw-bold no-margin pe-2">Comprar:</h6>
                        <ul class="select-list list-unstyled d-flex">
                            <?php foreach (explode(',', $comprar) as $item): ?>
                                <li class="select-item"><a href="comprar.php"><?php echo trim($item); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




    <!------------------- Seccion 3 (Descripcion completa y solicitud de adopcion) --------------------->
    <!-- ============================================================================================ -->
    <section class="product-info-tabs py-md-5">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <button class="nav-link fs-5 mb-2 text-start active" id="v-pills-reviews-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-reviews" type="button" role="tab"
                        aria-controls="v-pills-reviews" aria-selected="true">Solicitud de adopción</button>
                    <button class="nav-link fs-5 mb-2 text-start" id="v-pills-description-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-description" type="button" role="tab"
                        aria-controls="v-pills-description" aria-selected="false"
                        tabindex="-1">Comportamiento</button>
                    <button class="nav-link fs-5 mb-2 text-start" id="v-pills-additional-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-additional" type="button" role="tab"
                        aria-controls="v-pills-additional" aria-selected="false"
                        tabindex="-1">Compatibilidad</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-pills-reviews" role="tabpanel"
                        aria-labelledby="v-pills-reviews-tab" tabindex="0">
                        <h3>Solicitud de Adopción</h3>
                        <p>Complete todos los recuadros para poder ser evaluado</p>
                        <form id="form" class="form-group" action="php/procesar_adopcion.php" method="POST">
                            <input type="hidden" name="mascota_id" value="<?php echo $id_mascota; ?>"> <!-- ID de la mascota -->
                            <div class="pb-3">
                                <label>¿De qué tamaño es su hogar?</label>
                                <select name="tamano" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="grande">Grande</option>
                                    <option value="mediano">Mediano</option>
                                    <option value="pequeño">Pequeño</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>¿En donde descansaría su mascota?</label>
                                <select name="descansar" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="piso">Piso</option>
                                    <option value="cama">Cama propia</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>¿Cómo le gustaría que se comporte su mascota?</label>
                                <select name="comporte" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="tranquilo">Tranquilo</option>
                                    <option value="jugueton">Jugueton</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>¿Cuánto tiempo diario puede dedicar a la actividad física?</label>
                                <select name="fisica" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="mas">Más de una hora</option>
                                    <option value="menos">Menos de una hora</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>¿Cuál es su nivel de experiencia con mascotas?</label>
                                <select name="experiencia" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="mucha">Mucha</option>
                                    <option value="algo">Algo</option>
                                    <option value="nada">Nada</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>¿Comprararía juguetes para su mascota?</label>
                                <select name="juguete" class="form-control" required>
                                    <option value="" disabled selected hidden>Seleccionar</option>
                                    <option value="si">Si</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="pb-3">
                                <label>
                                    <input type="checkbox" required>
                                    <span class="label-body">Guardar mi información para futuras acciones</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-dark btn-large text-uppercase w-100">Enviar
                                solicitud</button>
                        </form>
                    </div>
                    <!-- Sección de comportamiento -->
                    <div class="tab-pane fade" id="v-pills-description" role="tabpanel"
                        aria-labelledby="v-pills-description-tab" tabindex="0">
                        <h2>Conducta de <?php echo htmlspecialchars($nombre); ?></h2>
                        <p><?php echo htmlspecialchars($comportamiento); ?></p>
                    </div>
                    <!-- Sección de compatibilidad -->
                    <div class="tab-pane fade" id="v-pills-additional" role="tabpanel"
                        aria-labelledby="v-pills-additional-tab" tabindex="0">
                        <h2>Requisitos para adoptar a <?php echo htmlspecialchars($nombre); ?></h2>
                        <p><?php echo htmlspecialchars($compatibilidad); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




    <?php include 'descuento.php'; ?>

    <?php include 'footer_insta.php'; ?>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    const mascotaId = <?php echo json_encode($id_mascota); ?>; 

    // Función para enviar el formulario y manejar la respuesta con SweetAlert2
    function enviarFormulario(event) {
        event.preventDefault(); // Prevenir el envío del formulario
        const form = document.getElementById('form');

        // Crear objeto FormData con los datos del formulario
        const formData = new FormData(form);

        // Enviar datos con fetch
        fetch('php/procesar_adopcion.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // Obtener la respuesta en formato JSON
        .then(data => {
            if (data.success) {
                // Mostrar el mensaje de éxito con SweetAlert2
                Swal.fire({
                    icon: 'success',
                    title: '¡Adopción Exitosa!',
                    text: data.message,
                    confirmButtonText: 'OK'
                }).then(() => {
                    document.getElementById('btnDisponibilidad').innerHTML = '<h6 class="btn btn-dark text-uppercase w-100">No disponible para adoptar</h6>';
                    actualizarDisponibilidad(mascotaId); // Actualizar la disponibilidad
                });
            } else {
                // Mostrar el mensaje de error con SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Error en la Adopción',
                    text: data.message,
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error en la solicitud. Inténtelo de nuevo más tarde.',
                confirmButtonText: 'OK'
            });
        });
    }

    // Función para actualizar la disponibilidad en la base de datos
    function actualizarDisponibilidad(idMascota) {
        fetch('php/actualizar_disponibilidad.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id_mascota=' + idMascota
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                console.error('Error al actualizar disponibilidad:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Agregar el event listener al formulario para manejar el submit
    document.getElementById('form').addEventListener('submit', enviarFormulario);
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