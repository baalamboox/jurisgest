$(document).ready(() => {

    // Sección de botones para sección de operaciones.
    const botonListaExpedientes = $(".boton-lista-expedientes");
    const botonCrearExpediente = $(".boton-crear-expediente");
    const botonOtorgarPermiso = $(".boton-otorgar-permiso");
    const botonListaPermisos = $(".boton-lista-permisos");
    const botonMiListaExpedientes = $(".boton-mi-lista-expedientes");

    // Cargar la tabla de expedientes por defecto cuando se cambia a la vista expedientes.
    $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);

    // Sección de asignación de eventos.
    botonListaExpedientes.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);
    });

    botonCrearExpediente.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/crear.php`);
    });

    botonOtorgarPermiso.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/otorgar-permiso.php`);
    });

    botonListaPermisos.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/lista-permisos.php`);
    });

    botonMiListaExpedientes.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);
    });

});