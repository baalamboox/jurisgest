$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        }
    });

    // Creación de un sweet alert para errores.
    const sweetAlertError = (mensaje, event, idUsuario) => {
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
        }).then(() => editarUsuario(event, idUsuario));
    }

    const expresionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const expresionNombresApellidos = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;

    const botonEditar = $(".boton-editar");
    const botonEliminar = $(".boton-eliminar");

    const listaPerfil = (perfil, usuarioActual) => {
        switch(perfil) {
            case "Super Administrador":
                if(usuarioActual) {
                    return `<option value="1">Super Administrador</option>`;
                } else {
                    return `
                        <option value="1">Super Administrador</option>
                        <option value="2">Administrador</option>
                        <option value="3">Usuario</option>
                    `;
                }
            case "Administrador":
                if(usuarioActual) {
                    return `<option value="2">Administrador</option>`;
                } else {
                    return `
                        <option value="2">Administrador</option>
                        <option value="1">Super Administrador</option>
                        <option value="3">Usuario</option>
                    `;
                }
            case "Usuario":
                if(usuarioActual) {
                    return `<option value="3">Usuario</option>`;
                } else {
                    return `
                        <option value="3">Usuario</option>
                        <option value="1">Super Administrador</option>
                        <option value="2">Administrador</option>
                    `;
                }
            default:
                return `
                    <option value="1">Super Administrador</option>
                    <option value="2">Administrador</option>
                    <option value="3">Usuario</option>
                `;
        }
    }

    const editarUsuario = (event, idUsuario) => {
        const celda = event.currentTarget.parentNode.parentNode.cells;
        const formularioHTML = `
            <form class="text-left px-4 pt-5 text-white">
                <div class="form-group">
                    <label for="correoElectronico">
                        <small><i class="fas fa-at mr-2 text-gold-light"></i>Correo electrónico</label></small>
                    <input type="email" class="form-control form-control-sm" id="correoElectronico" placeholder="Ingresa correo electrónico" value="${celda[5].innerText}" />
                </div>
                <div class="form-group">
                    <label for="nombres">
                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</label></small>   
                    <input type="text" class="form-control form-control-sm" id="nombres" placeholder="Ingresa nombre(s)" value="${celda[3].innerText}" />
                </div>
                <div class="form-group">
                    <label for="apellidos">
                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellido(s)</label></small>
                    <input type="text" class="form-control form-control-sm" id="apellidos" placeholder="Ingresa apellido(s)" value="${celda[4].innerText}" />
                </div>
                ${
                    event.currentTarget.id[0] == "-" ? `
                        <div class="form-group">
                            <label for="perfil">
                                <small><i class="fas fa-user-circle mr-2 text-gold-light"></i>Perfil</small>
                            </label>
                            <select class="form-control form-control-sm" id="perfil" />
                                ${listaPerfil(celda[2].innerText, true)}
                            </select>
                        </div>
                    `: `
                        <div class="form-group">
                            <label for="perfil">
                                <small><i class="fas fa-user-circle mr-2 text-gold-light"></i>Perfil</small>
                            </label>
                            <select class="form-control form-control-sm perfil" id="perfil" />
                                ${listaPerfil(celda[2].innerText, false)}
                            </select>
                        </div>
                    `
                }
            </form>
        `;
        Swal.fire({
            html: formularioHTML,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fas fa-save mr-2"></i>Guardar',
            cancelButtonText: '<i class="fas fa-times mr-2"></i>Cancelar',
            background: 'rgb(25, 21, 20)',
            customClass: {
                closeButton: "custom-button"
            },
            allowOutsideClick: false,
        }).then((resultado) => {
            if(resultado.isConfirmed) {
                const campoCorreoElectronico = $("#correoElectronico");
                const campoNombres = $("#nombres");
                const campoApellidos = $("#apellidos");
                const listaPerfil = $("#perfil");

                if(campoCorreoElectronico.val() != "") {
                    if(campoNombres.val() != "") {
                        if(campoApellidos.val() != "") {
                            if(expresionCorreo.test(campoCorreoElectronico.val())) {
                                if(expresionNombresApellidos.test(campoNombres.val())) {
                                    if(expresionNombresApellidos.test(campoApellidos.val())) {
                                        $.ajax({
                                            type: "POST",
                                            url: `${window.location.origin}/control/super-administrador/usuarios/actualizar.php`,
                                            data: {
                                                idUsuario: Math.abs(idUsuario),
                                                correoElectronico: campoCorreoElectronico.val(),
                                                nombres: campoNombres.val(),
                                                apellidos: campoApellidos.val(),
                                                perfil: listaPerfil.val()
                                            },
                                            success: respuesta => {
                                                const respuestaJSON = JSON.parse(respuesta);
                                                respuestaJSON.estado != 400 ? [
                                                    Swal.fire({
                                                        title: "¡Genial!",
                                                        text: "Actualización de usuario correcta.",
                                                        icon: "success",
                                                        background: 'rgb(25, 21, 20)',
                                                        allowOutsideClick: false,
                                                    }),
                                                    $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`)
                                                ] : false;
                                            }
                                        });
                                    } else {
                                        sweetAlertError("Apellido(s) inválido.", event, idUsuario);
                                    }
                                } else {
                                    sweetAlertError("Nombre(s) inválido.", event, idUsuario);
                                }
                            } else {
                                sweetAlertError("Correo electrónico inválido.", event, idUsuario);
                            }
                        } else {
                            sweetAlertError("Campo apellido(s) vacío.", event, idUsuario);
                        }
                    } else {
                        sweetAlertError("Campo nombre(s) vacío.", event, idUsuario);
                    }
                } else {
                    sweetAlertError("Campo correo electrónico vacío.", event, idUsuario);
                }
            }
        });
    }

    const eliminarUsuario = (idUsuario) => {
        Swal.fire({
            title: "¿Estas seguro?",
            text: "¡No se podrá revertir!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, borrar",
            background: 'rgb(25, 21, 20)',
            allowOutsideClick: false,
        }).then((resultado) => {
            if (resultado.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/usuarios/eliminar.php`,
                    data: {
                        idUsuario
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación de usuario correcta.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,

                            }),
                            $("#contenedorSeccionesUsuarios").load(`${window.location.origin}/view/plantillas/secciones/tabla-usuarios.php`)
                        ] : Swal.fire({
                                icon: 'error',
                                title: '¡Ups!',
                                html: `<small class="text-white">${respuestaJSON.mensaje}</small>`,
                                background: 'rgb(25, 21, 20)',
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                showCloseButton: true,
                                customClass: {
                                    closeButton: "custom-button"
                                }
                        });
                    }
                });
                
            }
        });
    }

    botonEditar.click((event) => editarUsuario(event, event.currentTarget.id));
    botonEliminar.click((event) => eliminarUsuario(event.currentTarget.id));
});