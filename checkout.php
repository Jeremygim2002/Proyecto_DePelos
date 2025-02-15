<?php
session_start();
include 'php/conexion_be.php';

// Obtener el carrito_id de la sesión
$carrito_id = $_SESSION['carrito_id'];

// Consultar los productos en el carrito
$sql_carrito = "SELECT * FROM carrito WHERE carrito_id = '$carrito_id'";
$result_carrito = mysqli_query($conexion_shopping_cart, $sql_carrito);
$productos_carrito = mysqli_fetch_all($result_carrito, MYSQLI_ASSOC);

// Calcular subtotal y total
$subtotal = 0;
$total = 0; // Inicializar la variable $total

foreach ($productos_carrito as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}
$subtotal = $total * 0.82; // Incluyendo IGV

// Consultar métodos de pago
$sql_metodos_pago = "SELECT * FROM metodo_pago";
$result_metodos_pago = mysqli_query($conexion_shopping_cart, $sql_metodos_pago);
$metodos_pago = mysqli_fetch_all($result_metodos_pago, MYSQLI_ASSOC);
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
  <title>DePelos | Checkout</title>


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

<body>


<?php include 'header_includes.php'; ?>


  <!------------------------------ Seccion 1 (Titulo) -------------------------------->
  <!-- ============================================================================ -->
  <section id="banner" class="py-3" style="background: #F9F3EC;">
    <div class="container">
      <div class="hero-content py-5 my-3">
        <h2 class="display-1 mt-3 mb-0">Checkout</h2>
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="bienvenida.php">Home</a>
          <span class="breadcrumb-item active" aria-current="page">Checkout</span>
        </nav>
      </div>
    </div>
  </section>



  <!------------------------------ Seccion 2 (Cuerpo) -------------------------------->
  <!-- ============================================================================ -->
  <section class="shopify-cart checkout-wrap">
        <div class="container py-5 my-5">
            <form class="form-group" action="php/procesar_pedido.php" method="post" id="formulario_pedido">
                <div class="row d-flex flex-wrap">
                    <div class="col-lg-6">
                        <h2 class="text-dark pb-3">Detalles de facturación</h2>
                        <div class="billing-details">
                            <label for="fname">Nombres</label>
                            <input type="text" id="fname" name="firstname" class="form-control mt-2 mb-4 ps-3" required>
                            <label for="lname">Apellidos</label>
                            <input type="text" id="lname" name="lastname" class="form-control mt-2 mb-4 ps-3" required>
                            <label for="dni">DNI</label>
                            <input type="text" id="dni" name="dni" class="form-control mt-2 mb-4" required>
                            <label for="departamento">Departamento</label>
                            <select name="departamento" class="form-select form-control mt-2 mb-4" required>
                                <option value="Lima">Lima</option>
                                <option value="Huancayo">Huancayo</option>
                                <option value="Piura">Piura</option>
                                <option value="Junin">Junin</option>
                            </select>
                            <label for="address">Dirección</label>
                            <input type="text" id="adr" name="address" placeholder="Nombre de la calle" class="form-control mt-3 ps-3 mb-3" required>
                            <input type="text" id="adr" name="address_number" placeholder="N° de la calle" class="form-control ps-3 mb-4" required>
                            <label for="city">Apartamento</label>
                            <input type="text" id="city" name="apartment" class="form-control mt-3 ps-3 mb-4" placeholder="piso">
                            <label for="phone">Celular</label>
                            <input type="text" id="phone" name="phone" class="form-control mt-2 mb-4 ps-3" required>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control mt-2 mb-4 ps-3" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="text-dark pb-3">Información adicional</h2>
                        <div class="billing-details">
                            <label for="notes">Notas (opcional)</label>
                            <textarea id="notes" name="notes" class="form-control pt-3 pb-3 ps-3 mt-2" placeholder="Notas sobre su orden"></textarea>
                        </div>
                        <div class="your-order mt-5">
                            <h2 class="display-7 text-dark pb-3">Monto Total</h2>
                            <div class="total-price">
                                <table cellspacing="0" class="table">
                                    <tbody>
                                        <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                            <th>Subtotal</th>
                                            <td data-title="Subtotal">
                                                <span class="price-amount amount ps-5">
                                                    <bdi>
                                                        <span class="price-currency-symbol">S/</span> <?php echo number_format($subtotal, 2); ?>
                                                    </bdi>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                            <th>Total</th>
                                            <td data-title="Total">
                                                <span class="price-amount amount ps-5">
                                                    <bdi>
                                                        <span class="price-currency-symbol">S/</span> <?php echo number_format($total, 2); ?>
                                                    </bdi>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="list-group mt-5 mb-3">
                                    <?php foreach ($metodos_pago as $metodo): ?>
                                    <label class="list-group-item d-flex gap-2 border-0">
                                        <input class="form-check-input flex-shrink-0" type="radio" name="metodo_pago" value="<?php echo $metodo['id_metodo_pago']; ?>" required>
                                        <span>
                                            <strong class="text-uppercase"><?php echo $metodo['nombre']; ?></strong>
                                            <small class="d-block text-body-secondary">
                                                <?php if ($metodo['nombre'] === 'Yape' || $metodo['nombre'] === 'Plin'): ?>
                                                    Se proporcionará un código QR.
                                                <?php else: ?>
                                                    Por transferencia o pago a cuenta.
                                                <?php endif; ?>
                                            </small>
                                        </span>
                                    </label>
                                    <?php endforeach; ?>
                                </div>
                                <button type="submit" name="submit" class="btn btn-dark btn-lg rounded-1 w-100">Hacer un pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>






    <?php include 'footer_insta.php'; ?>




  <script>
    document.getElementById('formulario_pedido').addEventListener('submit', function(event) {
        event.preventDefault(); // Detener el envío del formulario por defecto

        const formData = new FormData(this);

        fetch('php/procesar_pedido.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Pedido realizado con éxito',
                    text: 'Su pedido ha sido procesado. Se abrirá su boleta.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Abrir el PDF en una nueva pestaña
                    window.open(data.pdf_path, '_blank');

                    // Redirigir a la página principal
                    window.location.href = '../bienvenida.php';
                });
            } else {
                Swal.fire({
                    title: 'Error al procesar el pedido',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Error',
                text: 'Hubo un problema al procesar su pedido. Por favor, inténtelo nuevamente más tarde.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        });
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