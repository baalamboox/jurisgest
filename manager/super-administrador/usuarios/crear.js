$(document).ready(() => {
    // Sección de campos obtenidos por jQuery del formulario.
    const campoCorreoElectronico = $("#correoElectronico");
    const campoNombres = $("#nombres");
    const campoApellidos = $("#apellidos");
    const listaPerfil = $("#perfil");
    const botonCrearUsuario = $("#crearUsuario");
    const botonNuevoUsuario = $("#nuevoUsuario");
    const creacionUsuario = $("#creacionUsuario");
    const usuarioCreado = $("#usuarioCreado");
    const contraCreada = $("#contraCreada");

    // Sección de expresiones regulares para validación de campos.
    const expresionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const expresionNombresApellido = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;

    botonNuevoUsuario[0].hidden = true;

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
        // Agregar un manejador de evento de clic al botón de nuevo usuario
    botonNuevoUsuario.click(() => {
        botonNuevoUsuario[0].hidden = true;
        botonCrearUsuario[0].hidden = false;
        // Cargar la tabla de clientes en el contenedor de secciones de clientes
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/super-administrador/usuarios/crear.php`);
    });
    // Agregar un manejador de evento de clic al botón de Guardar cliente
    botonCrearUsuario.click(() => {
        //Validacion de los campos vacios 
        if(campoCorreoElectronico.val() != "") {
            if(campoNombres.val() != "") {
                if(campoApellidos.val() != "") {
                    if(listaPerfil.val() != 0) {
                        if(expresionCorreo.test(campoCorreoElectronico.val())) {
                            if(expresionNombresApellido.test(campoNombres.val())) {
                                if(expresionNombresApellido.test(campoApellidos.val())) {
                                    //Inicia una petición AJAX utilizando el método $.ajax de jQuery.
                                    $.ajax({
                                         //Especifica que la solicitud será de tipo POST.
                                        type: "POST",
                                        //Define la URL a la que se enviará la solicitud. 
                                        url: `${window.location.origin}/control/super-administrador/usuarios/crear.php`,
                                        //Define los datos que se enviarán con la solicitud en forma de objeto.
                                        data: {
                                            correoElectronico: campoCorreoElectronico.val(),
                                            nombres: campoNombres.val(),
                                            apellidos: campoApellidos.val(),
                                            perfil: listaPerfil.val()
                                        },
                                        //Define una función de callback que se ejecutará si la solicitud es exitosa. Esta función toma un parámetro respuesta.
                                        success: respuesta => {
                                            //Convierte la respuesta de la solicitud (que se asume es una cadena JSON) en un objeto JavaScript.
                                            const respuestaJSON = JSON.parse(respuesta);
                                            //Se muestra el mensaje de crear con SweetAlert 
                                            respuestaJSON.estado != 400 ? [
                                                botonCrearUsuario[0].hidden = true,
                                                botonNuevoUsuario[0].hidden = false,
                                                creacionUsuario.attr("hidden", false),
                                                usuarioCreado.text(respuestaJSON.datos.usuario),
                                                contraCreada.text(respuestaJSON.datos.contra)
                                            ] : [
                                                sweetAlertError("Ocurrió un error al crear el usuario.")
                                            ];
                                        }
                                    });
                                } else {
                                    sweetAlertError("Apellido(s) inválido.");
                                }
                            } else {
                                sweetAlertError("Nombre(s) inválido.");
                            }
                        } else {
                            sweetAlertError("Correo electrónico inválido.");
                        }
                    } else {
                        sweetAlertError("Perfil vacío.");
                    }
                } else {
                    sweetAlertError("Campo apellido(s) vacío.");
                }
            } else {
                sweetAlertError("Campo nombre(s) vacío.");
            }
        } else {
            sweetAlertError("Campo correo electrónico vacío.");
        }
    });
});