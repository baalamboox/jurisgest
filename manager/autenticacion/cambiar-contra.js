$(document).ready(() => {
    //Selecciona el botón que activará el cambio de contraseña.
    const botonCambiarContra = $(".boton-cambiar-contra");
    /*Formulario HTML para cambiar la contraseña,con campos para la contraseña actual, 
    nueva, confirmación de la nueva y una casilla para mostrar/ocultar contraseñas.*/
    const formularioHTML = `
        <form class="text-left px-4 pt-5 text-white">
            <div class="form-group">
                <label for="contraActual"><i class="fas fa-user-lock mr-2 text-gold-light"></i>Contraseña actual</label>
                <input type="password" class="form-control form-control-sm" id="contraActual" placeholder="Ingresa tu contraseña actual" />
            </div>
            <div class="form-group">
                <label for="contraActual"><i class="fas fa-lock mr-2 text-gold-light"></i>Nueva contraseña</label>
                <input type="password" class="form-control form-control-sm" id="contraNueva" placeholder="Ingresa tu nueva contraseña" />
            </div>
            <div class="form-group">
                <label for="contraActual"><i class="fas fa-lock mr-2 text-gold-light"></i>Confirmar contraseña</label>
                <input type="password" class="form-control form-control-sm" id="confirmarContra" placeholder="Confirma tu nueva contraseña" />
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="mostrarOcultarContra">
                <label class="form-check-label" for="mostrarOcultarContra">Mostrar contraseñas</label>
            </div>
        </form>
    `;
    //Define una expresión regular que valida que la nueva contraseña tenga exactamente 10 caracteres.
    const expresionContra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*.,:?(){}<>"])[A-Za-z\d!@#$%^&*.,:?(){}<>"]{10,10}$/;

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
    //Añade un manejador de eventos click al botón para cambiar la contraseña.
    botonCambiarContra.click(() => {
    //Muestra el formulario en un modal SweetAlert y espera a que el usuario confirme o cancele.
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
                const campoContraActual = $("#contraActual");
                const campoContraNueva = $("#contraNueva");
                const campoConfirmarContra = $("#confirmarContra");

                // Verifica que el campo de la contraseña actual no esté vacío.
                if(campoContraActual.val() != "") {
                    //Verifica que el campo de la nueva contraseña no esté vacío.
                    if(campoContraNueva.val() != "") {
                        //Verifica que el campo para confirmar la nueva contraseña no esté vacío.
                        if(campoConfirmarContra.val() != "") {
                            //Verifica que la nueva contraseña tenga exactamente 10 caracteres.
                            if(campoContraNueva.val().length >= 10 && campoContraNueva.val().length <= 10) {
                                //Valida que la nueva contraseña cumpla con el patrón definido en expresionContra.
                                if(expresionContra.test(campoContraNueva.val())) {
                                    //Verifica que la nueva contraseña y su confirmación coincidan.
                                    if(campoContraNueva.val() == campoConfirmarContra.val()) {
                                        //Inicia una petición AJAX utilizando el método $.ajax de jQuery.
                                        $.ajax({
                                            //Especifica que la solicitud será de tipo POST.
                                            type: "POST",
                                            //Define la URL a la que se enviará la solicitud. 
                                            url: `${window.location.origin}/control/autenticacion/cambiar-contra.php`,
                                            //Define los datos que se enviarán con la solicitud en forma de objeto.
                                            data: {
                                                contraActual: campoContraActual.val(),
                                                contraNueva: campoContraNueva.val()
                                            },
                                            success: peticion => {
                                                //Analiza la respuesta del servidor.
                                                const peticionJSON = JSON.parse(peticion);
                                                //Si la respuesta no indica un error (estado 400), muestra un SweetAlert de éxito. 
                                                //Si hay un error, muestra un SweetAlert de error con el mensaje proporcionado por el servidor.
                                                peticionJSON.estado != 400 ? [
                                                    Swal.fire({
                                                        position: "top-end",
                                                        icon: "success",
                                                        title: peticionJSON.mensaje,
                                                        showConfirmButton: false,
                                                        timer: 2500,
                                                        background: 'rgb(25, 21, 20)'
                                                    })
                                                ] : [
                                                    sweetAlertError(peticionJSON.mensaje)
                                                ];
                                            }
                                        });
                                    } else {
                                        sweetAlertError("La contraseña nueva y su confirmación no coinciden.");
                                    }
                                } else {
                                    sweetAlertError("La contraseña nueva debe tener números, letras (Mayúsculas o Minúsculas) y algunos de los siguientes caracteres: $ @ # &.");
                                }
                            } else {
                                sweetAlertError("La contraseña nueva debe ser de mínimo y máximo 10 caracteres.");
                            }
                        } else {
                            sweetAlertError("Campo confirmar contraseña vacío.");
                        }
                    } else {
                        sweetAlertError("Campo contraseña nueva vacía.");
                    }
                } else {
                    sweetAlertError("Campo contraseña actual vacía.");
                }
            }
        });

        const campoContraActual = $("#contraActual");
        const campoContraNueva = $("#contraNueva");
        const campoConfirmarContra = $("#confirmarContra");
        //Obtiene referencias a la etiqueta y la casilla para mostrar/ocultar contraseñas.
        const etiquetaMostrarOcultar = $('label[for="mostrarOcultarContra"]');
        const mostrarOcultarContra = $("#mostrarOcultarContra");
        //Añade un manejador de eventos change a la casilla para alternar entre mostrar y ocultar las contraseñas.
        mostrarOcultarContra.change(() => {
            mostrarOcultarContra.is(":checked") ? [
                campoContraActual.attr("type", "text"),
                campoContraNueva.attr("type", "text"),
                campoConfirmarContra.attr("type", "text"),
                etiquetaMostrarOcultar.text("Ocultar contraseñas")
            ] : [
                campoContraActual.attr("type", "password"),
                campoContraNueva.attr("type", "password"),
                campoConfirmarContra.attr("type", "password"),
                etiquetaMostrarOcultar.text("Mostrar contraseñas")
            ];
        });

    });
});
