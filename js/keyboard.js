// Función para ajustar el desplazamiento cuando se activa un campo de entrada en dispositivos con una altura menor a 600px
function ajustarDesplazamiento(event) {
    // Obtener la altura del dispositivo
    var viewportHeight = window.innerHeight;

    // Verificar si la altura es menor a 600 píxeles
    if (viewportHeight < 600) {
        // Calcular el desplazamiento necesario para mostrar el botón de envío
        var botonEnvio = document.querySelector('input[type="submit"]');
        var botonEnvioRect = botonEnvio.getBoundingClientRect();
        var offset = botonEnvioRect.top + window.pageYOffset - viewportHeight / 2; // Ajustamos el valor aquí

        // Desplazar la página
        window.scrollTo({ top: offset, behavior: 'smooth' });
    }
}

// Agregar listeners para el evento 'focusin' en todos los campos de entrada
var camposEntrada = document.querySelectorAll('input, textarea');
camposEntrada.forEach(function(elemento) {
    elemento.addEventListener('focusin', ajustarDesplazamiento);
});