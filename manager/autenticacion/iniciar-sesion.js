$(document).ready(() => {

    // Obtención de las refencias (Objetos) de los elementos HTML.
    const usuario = $("#usuario");
    const contra = $("#contra");
    const mostrarOcultarContra = $("#mostrarOcultarContra");
    const etiquetaMostrarOcultar = $('label[for="mostrarOcultarContra"]');
    const botonIniciarSesion = $("#botonIniciarSesion");

    // Creación de un sweet alert para errores.
    const sweetAlertError = (mensaje) => {
        return Swal.fire({
            icon: 'error',
            title: '¡Ups!',
            html: `<small class="text-white">${mensaje}</small>`,
            background: 'rgb(25, 21, 20)',
            showConfirmButton: false,
            allowOutsideClick: false,
            showCloseButton: true,
            customClass: {
                closeButton: "custom-button"
            }
        });
    }

    // Asignación de evento para mostrar y ocultrar contraseña.
    mostrarOcultarContra.change(() => {
        mostrarOcultarContra.is(":checked") ? [
            contra.attr("type", "text"),
            etiquetaMostrarOcultar.text("Ocultar contraseña")
        ] : [
            contra.attr("type", "password"),
            etiquetaMostrarOcultar.text("Mostrar contraseña")
        ];
    });

    // Asignación del evento click al botón iniciar sesión.
    botonIniciarSesion.click(() => {
        
        // Validación de vacios para el campo usuario.
        if(usuario.val() != "") {

            // Validación de vacios para el campo contraseña.
            if(contra.val() != "") {
                
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/autenticacion/iniciar-sesion.php`,
                    data: {
                        usuario: usuario.val(),
                        contra: contra.val()
                    },
                    success: respuesta => {
                        // const respuestaJSON = JSON.parse(respuesta);
                        // if(respuestaJSON.estado != 400) {
                        //     switch (respuestaJSON.datos.perfil) {
                        //         case 1:
                        //             window.location.href = "super-administrador";
                        //             break;
                        //         case 2:
                        //             window.location.href = "administrador";
                        //             break;
                        //         case 3:
                        //             window.location.href = "usuario";
                        //             break;
                        //     }
                        // } else {
                        //     switch (respuestaJSON.errores.campo) {
                        //         case "usuario":
                        //             sweetAlertError(respuestaJSON.mensaje);
                        //             break;
                        //         case "contraseña":
                        //             sweetAlertError(respuestaJSON.mensaje);
                        //             break;
                        //     }
                        //
                        console.log(respuesta);
                    }
                });
            } else {
                sweetAlertError("Campo contraseña vacía");
            }
        } else {
            sweetAlertError("Campo usurio vacío.");
        }
    });
});