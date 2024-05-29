$(document).ready(() => {
    // $("#contenedorSeccionesUsuarios").load("");
    const botonListaUsuarios = $(".boton-lista-usuarios");
    const botonCrearUsuario = $(".boton-crear-usuario");

    $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`);

    botonListaUsuarios.click(() => {
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`);
    });

    botonCrearUsuario.click(() => {
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/super-administrador/usuarios/crear.php`);
    });
});