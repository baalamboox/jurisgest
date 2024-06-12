$(document).ready(() => {

    // Sección de botones para sección de operaciones.
    const botonListaAudiencias = $(".boton-lista-audiencias");
    const botonCrearAudiencia = $(".boton-crear-audiencia");

    // Cargar la tabla de clientes por defecto cuando se cambia a la vista clientes.
    $("#contenedorSeccionesAudiencias").load(`${window.location.origin}/view/super-administrador/agenda/tabla-audiencias.php`);

    // Sección de asignación de eventos.
    botonListaAudiencias.click(() => {
        $("#contenedorSeccionesAudiencias").load(`${window.location.origin}/view/super-administrador/agenda/tabla-audiencias.php`);
    });

    botonCrearAudiencia.click(() => {
        $("#contenedorSeccionesAudiencias").load(`${window.location.origin}/view/super-administrador/agenda/crear.php`);
    });
});