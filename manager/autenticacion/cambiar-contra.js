$(document).ready(() => {
    const botonCambiarContra = $(".boton-cambiar-contra");

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
        </form>
    `;

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

    botonCambiarContra.click(() => {
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

                if(campoContraActual.val() != "") {
                    if(campoContraNueva.val() != "") {
                        if(campoConfirmarContra.val() != "") {
                            $.ajax({
                                type: "POST",
                                url: `${window.location.origin}/control/autenticacion/cambiar-contra.php`,
                                data: {
                                    contraActual: campoContraActual.val(),
                                    contraNueva: campoContraNueva.val()
                                },
                                success: peticion => {
                                    const peticionJSON = JSON.parse(peticion);
                                    console.log(peticionJSON);
                                }
                            });
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
    });
});
