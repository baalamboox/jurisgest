$(document).ready(() => {
    const campoCorreoElectronico = $("#correoElectronico");
    const campoNombres = $("#nombres");
    const campoApellidos = $("#apellidos");
    const listaPerfil = $("#perfil");
    const botonCrearUsuario = $("#crearUsuario");
    const botonNuevoUsuario = $("#nuevoUsuario");
    const creacionUsuario = $("#creacionUsuario");
    const usuarioCreado = $("#usuarioCreado");
    const contraCreada = $("#contraCreada");

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

    botonNuevoUsuario.click(() => {
        botonNuevoUsuario[0].hidden = true;
        botonCrearUsuario[0].hidden = false;
        $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/super-administrador/usuarios/crear.php`);
    });

    botonCrearUsuario.click(() => {
        if(campoCorreoElectronico.val() != "") {
            if(campoNombres.val() != "") {
                if(campoApellidos.val() != "") {
                    if(listaPerfil.val() != 0) {
                        if(expresionCorreo.test(campoCorreoElectronico.val())) {
                            if(expresionNombresApellido.test(campoNombres.val())) {
                                if(expresionNombresApellido.test(campoApellidos.val())) {
                                    $.ajax({
                                        type: "POST",
                                        url: `${window.location.origin}/control/super-administrador/usuarios/crear.php`,
                                        data: {
                                            correoElectronico: campoCorreoElectronico.val(),
                                            nombres: campoNombres.val(),
                                            apellidos: campoApellidos.val(),
                                            perfil: listaPerfil.val()
                                        },
                                        success: respuesta => {
                                            const respuestaJSON = JSON.parse(respuesta);
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