$(document).ready(() => {

    // Se cargar por defecto la vista de inicio.
    $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/inicio.php`);

    // Se asigna un evento de clic al elemento botón de inicio para mostrar la vista correspondiente.
    $(".boton-inicio").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/inicio.php`);
    });

    // Se asigna un evento de clic al elemento botón de inicio para mostrar la vista correspondiente.
    $(".boton-contactanos").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/contactanos.php`);
    })

    // Se asigna un evento de clic al elemento botón de expedientes para mostrar la bista correspondiente.
    $(".boton-expedientes").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/expedientes.php`);
    });
});