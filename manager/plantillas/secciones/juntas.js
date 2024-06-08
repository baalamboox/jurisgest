$(document).ready(() => {

    // Sección de botones para sección de operaciones.
    const botonListaJuntas = $(".boton-lista-juntas");
    const botonCrearJunta = $(".boton-crear-junta");

    // Cargar la tabla de juntas por defecto cuando se cambia a la vista juntas.
    $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`);

    // Sección de asignación de eventos.
    botonListaJuntas.click(() => {
        $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`);
    });

    botonCrearJunta.click(() => {
        $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/super-administrador/juntas/crear.php`);
    });
});