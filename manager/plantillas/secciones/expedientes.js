$(document).ready(() => {

    // Sección de botones para sección de operaciones.
    const botonListaExpedientes = $(".boton-lista-expedientes");
    const botonCrearExpediente = $(".boton-crear-expediente");
    const botonOtorgarPermiso = $(".boton-otorgar-permiso");
    const botonListaPermisos = $(".boton-lista-permisos");
    const botonMiListaExpedientes = $(".boton-mi-lista-expedientes");

    // Cargar la tabla de expedientes por defecto cuando se cambia a la vista expedientes.
    $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);

    // Se carga la tabla de expedientes en el contenedor correspondiente.
    botonListaExpedientes.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);
    });
    //Se carga la vista de creación de expedientes en el contenedor correspondiente.
    botonCrearExpediente.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/crear.php`);
    });
    //Se carga la vista para otorgar permisos en el contenedor correspondiente.
    botonOtorgarPermiso.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/otorgar-permiso.php`);
    });
    //se carga la lista de permisos en el contenedor correspondiente.
    botonListaPermisos.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/lista-permisos.php`);
    });
    //Se carga la tabla de expedientes en el contenedor correspondiente.
    botonMiListaExpedientes.click(() => {
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`);
    });

});