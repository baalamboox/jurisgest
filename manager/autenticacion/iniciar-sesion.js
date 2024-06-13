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
                
                //Inicia una petición AJAX utilizando el método $.ajax de jQuery.
                $.ajax({
                    //Especifica que la solicitud será de tipo POST.
                    type: "POST",
                    //Define la URL a la que se enviará la solicitud. 
                    url: `${window.location.origin}/control/autenticacion/iniciar-sesion.php`,
                    //Define los datos que se enviarán con la solicitud en forma de objeto.
                    data: {
                        usuario: usuario.val(),
                        contra: contra.val()
                    },
                    //Define una función de callback que se ejecutará si la solicitud es exitosa. Esta función toma un parámetro respuesta.
                    success: respuesta => {
                        //Convierte la respuesta de la solicitud (que se asume es una cadena JSON) en un objeto JavaScript.
                        const respuestaJSON = JSON.parse(respuesta);
                        //Verifica si el estado de la respuesta no es 400 
                        if(respuestaJSON.estado != 400) {
                            //Utiliza una estructura switch para redirigir al usuario basado en el perfil recibido en la respuesta.
                            switch (respuestaJSON.datos.perfil) {

                                case 1:
                                    //Redirige a la página del super-administrador.
                                    window.location.href = "super-administrador";
                                    break;
                                case 2:
                                    //Redirige a la página del administrador.
                                    window.location.href = "administrador";
                                    break;
                                case 3:
                                    //Redirige a la página del usuario.
                                    window.location.href = "usuario";
                                    break;
                            }
                            //Caso contrario, si el estado de la respuesta es 400.
                        } else {
                            //Utiliza una estructura switch para manejar los errores basados en el campo que tiene el error.
                            switch (respuestaJSON.errores.campo) {
                                case "usuario":
                                    //Muestra un mensaje de error utilizando una función sweetAlertError con el mensaje de error de la respuesta.
                                    sweetAlertError(respuestaJSON.mensaje);
                                    break;
                                case "contraseña":
                                    //Muestra un mensaje de error utilizando una función sweetAlertError con el mensaje de error de la respuesta.
                                    sweetAlertError(respuestaJSON.mensaje);
                                    break;
                            }
                        }
                    }
                });
                //Caso contrario, si el campo de contraseña está vacío
                } else {
                    sweetAlertError("Campo contraseña vacía");
                    }
                //Caso contrario, si el campo de usuario está vacío.
        } else {
            sweetAlertError("Campo usurio vacío.");
        }
    });
});