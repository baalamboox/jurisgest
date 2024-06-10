$(document).ready(() => {
    const listaExpedientes = $("#listaExpedientes");
    const listaUsuarios = $("#listaUsuarios");
    

    const permisoExpediente = $("#permisoExpediente");

    // Sección de botones obtenidos por JQuery.
    const botonDarPermiso = $("#darPermiso");
    const botonNuevoPermiso = $("#nuevoPermiso");

    // Oculta el boton de crear nuevo permiso.
    botonNuevoPermiso[0].hidden = true;

    listaExpedientes.chosen({
        no_results_text: "No se encontró: ",
        width: "100%"
    });
    listaUsuarios.chosen({
        no_results_text: "No se encontró: ",
        width: "100%"
    });

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

    // Asignación del evento clic al botón de nuevo expediente para mostrar lo y recargar la vista correspondiente.
    botonNuevoPermiso.click(() => {
        botonNuevoPermiso[0].hidden = true;
        botonDarPermiso[0].hidden = false;
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/otorgar-permiso.php`);
    });

    // Asignación del evento clic al botón de crear expediente para su correspondiente acción.
    botonDarPermiso.click(() => {
        if(listaExpedientes.val() != 0) {
            if(listaUsuarios.val() != 0) {
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/expedientes/otorgar-permiso.php`,
                    data: {
                        expedienteID: listaExpedientes.val(),
                        usuarioID: listaUsuarios.val(),
                    },
                    success: respuesta => {
                        const respuestaJSON = JSON.parse(respuesta);
                        console.log(respuestaJSON);
                        // respuestaJSON.estado != 400 ? [
                        //     botonDarPermiso[0].hidden = true,
                        //     botonNuevoPermiso[0].hidden = false,
                        //     permisoExpedienteExpediente.attr("hidden", false)
                        // ] : [
                        //     sweetAlertError("Ocurrió un error al dar permiso expediente-usuario.")
                        // ];
                    }
                });
            } else {
                sweetAlertError("Campo usuario vacío.");
            }
        } else {
            sweetAlertError("Campo expediente vacío.");
        }
    });
});