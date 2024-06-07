$(document).ready(() => {

    // Sección de botones para sección de operaciones.
    const botonListaClientes = $(".boton-lista-clientes");
    const botonCrearCliente = $(".boton-crear-cliente");

    // Cargar la tabla de clientes por defecto cuando se cambia a la vista clientes.
    $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-clientes.php`);

    // Sección de asignación de eventos.
    botonListaClientes.click(() => {
        $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-clientes.php`);
    });

    botonCrearCliente.click(() => {
        $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/super-administrador/clientes/crear.php`);
    });
});