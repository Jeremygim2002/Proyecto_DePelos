<?php
// Incluir archivo de conexión a la base de datos
include 'conexion_be.php';

// Inicializar array de productos
$productos = [];

// Capturar los parámetros de filtrado desde la URL
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$precio = isset($_GET['precio']) ? $_GET['precio'] : '';

// Construir la consulta SQL base
$sql = "SELECT p.id_producto, p.nombre AS nombre_producto, p.marca, p.precio, p.imagen, c.nombre AS nombre_categoria, ta.nombre AS tipo_animal
        FROM producto p
        INNER JOIN categoria c ON p.id_categoria = c.id_categoria
        INNER JOIN tipo_animal ta ON p.id_tipo_animal = ta.id_tipo_animal
        WHERE 1=1"; // Siempre verdadero, facilita agregar condiciones

// Filtrar por categoría
if ($categoria !== 'todos') {
    if ($categoria === 'ropa') {
        $sql .= " AND p.id_categoria = 1"; // ID de Ropa
    } elseif ($categoria === 'comida') {
        $sql .= " AND p.id_categoria = 2"; // ID de Comida
    } elseif ($categoria === 'accesorios') {
        $sql .= " AND p.id_categoria = 3"; // ID de Accesorios
    }
}

// Filtrar por tipo de animal
if (!empty($tipo)) {
    if ($tipo === 'perros') {
        $sql .= " AND ta.nombre = 'Perro'";
    } elseif ($tipo === 'gatos') {
        $sql .= " AND ta.nombre = 'Gato'";
    }
}

// Filtrar por rango de precio
if (!empty($precio)) {
    if ($precio === '10') {
        $sql .= " AND p.precio < 10";
    } elseif ($precio === '10-50') {
        $sql .= " AND p.precio BETWEEN 10 AND 50";
    } elseif ($precio === '50-100') {
        $sql .= " AND p.precio BETWEEN 50 AND 100";
    } elseif ($precio === '100-500') {
        $sql .= " AND p.precio BETWEEN 100 AND 500";
    }
}

// Ejecutar la consulta
$result = mysqli_query($conexion_shopping_cart, $sql);

// Verificar si la consulta fue exitosa y agregar los productos al array
if ($result !== false && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }
} else {
    echo "No se encontraron productos para los criterios seleccionados.<br>";
}

// Cerrar la conexión
mysqli_close($conexion_shopping_cart);
?>

