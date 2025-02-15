<?php
session_start();
include 'conexion_be.php'; // Conectar a la base de datos

// Incluir la librería TCPDF
require_once('../tcpdf/tcpdf.php'); // Asegúrate de que la ruta sea correcta

$response = array('success' => false, 'message' => 'Hubo un problema al procesar su pedido. Por favor, inténtelo nuevamente más tarde.');

// Obtener datos del formulario
$nombre = $_POST['firstname'];
$apellido = $_POST['lastname'];
$dni = $_POST['dni'];
$departamento = $_POST['departamento'];
$direccion = $_POST['address'] . " " . $_POST['address_number'];
$apartamento = $_POST['apartment'];
$celular = $_POST['phone'];
$email = $_POST['email'];
$notas = $_POST['notes'];
$id_metodo_pago = $_POST['metodo_pago'];

try {
    // Insertar datos en la tabla usuario
    $sql_usuario = "INSERT INTO usuario (nombre, apellido, dni, departamento, direccion, apartamento, celular, email)
                    VALUES ('$nombre', '$apellido', '$dni', '$departamento', '$direccion', '$apartamento', '$celular', '$email')";
    if (!mysqli_query($conexion_shopping_cart, $sql_usuario)) {
        throw new Exception("Error al registrar el usuario: " . mysqli_error($conexion_shopping_cart));
    }
    $id_usuario = mysqli_insert_id($conexion_shopping_cart); // Obtener el ID del usuario insertado

    // Calcular el total del carrito desde la tabla carrito
    $carrito_id = $_SESSION['carrito_id'];
    $sql_carrito = "SELECT SUM(cantidad * precio) AS total FROM carrito WHERE carrito_id = '$carrito_id'";
    $result_carrito = mysqli_query($conexion_shopping_cart, $sql_carrito);
    $row = mysqli_fetch_assoc($result_carrito);
    $total = $row['total'];

    // Insertar datos en la tabla orden_compra
    $sql_orden_compra = "INSERT INTO orden_compra (id_usuario, id_metodo_pago, total) 
                         VALUES ($id_usuario, $id_metodo_pago, $total)";
    if (!mysqli_query($conexion_shopping_cart, $sql_orden_compra)) {
        throw new Exception("Error al generar la orden de compra: " . mysqli_error($conexion_shopping_cart));
    }
    $id_orden = mysqli_insert_id($conexion_shopping_cart); // Obtener el ID de la orden de compra insertada

    // Insertar datos en la tabla orden_detalle
    $sql_carrito_detalle = "SELECT * FROM carrito WHERE carrito_id = '$carrito_id'";
    $result_carrito_detalle = mysqli_query($conexion_shopping_cart, $sql_carrito_detalle);

    while ($producto = mysqli_fetch_assoc($result_carrito_detalle)) {
        $id_producto = $producto['id_producto'];
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];

        $sql_orden_detalle = "INSERT INTO orden_detalle (id_orden, id_producto, cantidad, precio)
                              VALUES ($id_orden, $id_producto, $cantidad, $precio)";

        if (!mysqli_query($conexion_shopping_cart, $sql_orden_detalle)) {
            throw new Exception("Error al insertar en orden_detalle: " . mysqli_error($conexion_shopping_cart));
        }
    }

    // Limpiar el carrito
    $sql_limpiar_carrito = "DELETE FROM carrito WHERE carrito_id = '$carrito_id'";
    if (!mysqli_query($conexion_shopping_cart, $sql_limpiar_carrito)) {
        throw new Exception("Error al limpiar el carrito: " . mysqli_error($conexion_shopping_cart));
    }

    // Crear PDF con TCPDF
    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Tu Tienda');
    $pdf->SetTitle('Boleta de Orden de Compra');
    $pdf->SetSubject('Detalles de la Orden de Compra');
    $pdf->SetKeywords('boleta, orden, compra');

    $pdf->AddPage();

    // Contenido de la boleta
    $html = '<h1>Boleta de Orden de Compra</h1>';
    $html .= '<p><strong>ID de Orden:</strong> ' . $id_orden . '</p>'; // Mostrar ID de Orden
    $html .= '<p><strong>Cliente:</strong> ' . $nombre . ' ' . $apellido . '</p>';
    $html .= '<p><strong>DNI:</strong> ' . $dni . '</p>';
    $html .= '<p><strong>Dirección:</strong> ' . $direccion . ', ' . $departamento . '</p>';
    $html .= '<p><strong>Celular:</strong> ' . $celular . '</p>';
    $html .= '<p><strong>Email:</strong> ' . $email . '</p>';
    $html .= '<h2>Detalles de la Orden</h2>';
    $html .= '<table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>';

    // Agregar detalles de los productos
    mysqli_data_seek($result_carrito_detalle, 0); // Resetear puntero de resultados
    while ($producto = mysqli_fetch_assoc($result_carrito_detalle)) {
        $subtotal = $producto['cantidad'] * $producto['precio'];
        $html .= '<tr>
                    <td>' . $producto['nombre'] . '</td>
                    <td>' . $producto['cantidad'] . '</td>
                    <td>S/ ' . number_format($producto['precio'], 2) . '</td>
                    <td>S/ ' . number_format($subtotal, 2) . '</td>
                  </tr>';
    }

    $html .= '</tbody>
            </table>';
    $html .= '<h2>Total: S/ ' . number_format($total, 2) . '</h2>';

    $pdf->writeHTML($html, true, false, true, false, '');

    // Crear un nombre de archivo único usando el ID de la orden
    $pdf_directory = __DIR__ . '/../pdf_orden_compra/'; // Carpeta fuera de 'php'
    if (!is_dir($pdf_directory)) {
        mkdir($pdf_directory, 0777, true); // Crear la carpeta si no existe
    }

    $file_name = 'boleta_orden_' . $id_orden . '.pdf';
    $file_path = $pdf_directory . $file_name;

    // Guardar PDF en el servidor
    $pdf->Output($file_path, 'F'); // Guardar en el servidor

    // Verificar la existencia del archivo antes de enviar la respuesta
    if (file_exists($file_path)) {
        $response['success'] = true;
        $response['message'] = 'Pedido procesado y PDF generado correctamente.';
        $response['pdf_path'] = '../pdf_orden_compra/' . $file_name; // Ruta del PDF para el cliente
    } else {
        $response['message'] = 'No se pudo generar el archivo PDF.';
    }
} catch (Exception $e) {
    $response['message'] = 'Error al procesar el pedido: ' . $e->getMessage();
}

// Enviar la respuesta JSON
echo json_encode($response);
?>
