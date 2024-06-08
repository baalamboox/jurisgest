$(document).ready(() => {
    const listaClientes = $("#listaClientes");
    const listaJuntas = $("#listaJuntas");

    const creacionExpediente = $("#creacionExpediente");

    // Sección de botones obtenidos por JQuery.
    const botonCrearExpediente = $("#crearExpediente");
    const botonNuevoExpediente = $("#nuevoExpediente");

    // Oculta el boton de crear nueva junta.
    botonNuevoExpediente[0].hidden = true;

    listaClientes.chosen({
        no_results_text: "No se encontró: ",
        width: "100%"
    });
    listaJuntas.chosen({
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
    botonNuevoExpediente.click(() => {
        botonNuevoExpediente[0].hidden = true;
        botonCrearExpediente[0].hidden = false;
        $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/crear.php`);
    });

    // Asignación del evento clic al botón de crear expediente para su correspondiente acción.
    botonCrearExpediente.click(() => {
        if(campoNombreJunta.val() != "") {
            if (expresionNombreJunta.test(campoNombreJunta.val())) {
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/juntas/crear.php`,
                    data: {
                        nombreJunta: campoNombreJunta.val()
                    },
                    success: respuesta => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            botonCrearJunta[0].hidden = true,
                            botonNuevaJunta[0].hidden = false,
                            creacionJunta.attr("hidden", false)
                        ] : [
                            sweetAlertError("Ocurrió un error al crear la junta.")
                        ];
                    }
                });
            } else {
                sweetAlertError("Campo junta inválido.");
            }
        } else {
            sweetAlertError("Campo junta vacío.");
        }
    });
});