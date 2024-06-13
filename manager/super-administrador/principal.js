$(document).ready(() => {

    // Se cargar por defecto la vista de inicio.
    $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/inicio.php`);

    // Se asigna un evento de clic al elemento botón de inicio para mostrar la vista correspondiente.
    $(".boton-inicio").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/inicio.php`);
    });

    // Se asigna un evento de clic al elemento botón de contactanos para mostrar la vista correspondiente.
    $(".boton-contactanos").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/contactanos.php`);
    })

    // Se asigna un evento de clic al elemento botón de clientes para mostrar la vista correspondiente.
    $(".boton-clientes").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/clientes.php`);
    });

    // Se asigna un evento de clic al elemento botón de expedientes para mostrar la vista correspondiente.
    $(".boton-expedientes").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/expedientes.php`);
    });

    // Se asigna un evento de clic al elemento botón de Agenda para mostrar la vista correspondiente.
    $(".boton-agenda").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/super-administrador/agenda/agenda.php`);
    });

    //  Se asigna el evento clic al elemento botón de juntas para mostrar su correspondiente vista.
    $(".boton-juntas").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/juntas.php`);
    });

    // Se asigna un evento de clic al elemento botón de usuarios para mostrar la vista correspondiente.
    $(".boton-usuarios").click(() => {
        $("#contenedorSecciones").load(`${window.location.origin}/view/plantillas/secciones/usuarios.php`);
    });
});