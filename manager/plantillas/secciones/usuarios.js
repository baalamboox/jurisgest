$(document).ready(() => {
    // Sección de botones para sección de operaciones.
    const botonListaUsuarios = $(".boton-lista-usuarios");
    const botonCrearUsuario = $(".boton-crear-usuario");

    // Cargar la tabla de usuario por defecto cuando se cambia a la vista usuario.
    $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`);
    // Sección de asignación de eventos.
    botonListaUsuarios.click(() => {
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`);
    });
    //Se carga la vista de creación de Usuario en el contenedor correspondiente.    
    botonCrearUsuario.click(() => {
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/super-administrador/usuarios/crear.php`);
    });
});