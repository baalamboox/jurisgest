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

    // Se asigna un evento de clic al elemento botón de clientes para mostrar la vista correspondiente.
    $(".boton-clientes").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/clientes.php`);
    });
    // Se asigna un evento de clic al elemento botón de expedientes para mostrar la bista correspondiente.
    $(".boton-expedientes").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/expedientes.php`);
    });

    // Se asigna un evento de clic al elemento botón de usuarios para mostrar la vista correspondiente.
    $(".boton-usuarios").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/usuarios.php`);
    });
});