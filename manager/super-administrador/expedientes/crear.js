$(document).ready(() => {
    const campoNombreExpediente = $("#nombreExpediente");
    const campoNombreEmpresa = $("#nombreEmpresa");
    const listaClientes = $("#listaClientes");
    const listaJuntas = $("#listaJuntas");
    const campoNota = $("#nota");
    const listaEstado = $("#estado");
    

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
        if(campoNombreExpediente.val() != "") {
            if(campoNombreEmpresa.val() != "") {
                if(listaClientes.val() != 0) {
                    if(listaJuntas.val() != 0) {
                        if(campoNota.val() != "") {
                            if(listaEstado.val() != 0) {
                                $.ajax({
                                    type: "POST",
                                    url: `${window.location.origin}/control/super-administrador/expedientes/crear.php`,
                                    data: {
                                        nombreExpediente: campoNombreExpediente.val(),
                                        nombreEmpresa: campoNombreEmpresa.val(),
                                        cliente_id: listaClientes.val(),
                                        junta_id: listaJuntas.val(),
                                        nota: campoNota.val(),
                                        estado: listaEstado.val()
                                    },
                                    success: respuesta => {
                                        const respuestaJSON = JSON.parse(respuesta);
                                        respuestaJSON.estado != 400 ? [
                                            botonCrearExpediente[0].hidden = true,
                                            botonNuevoExpediente[0].hidden = false,
                                            creacionExpediente.attr("hidden", false)
                                        ] : [
                                            sweetAlertError("Ocurrió un error al crear el expediente.")
                                        ];
                                    }
                                });
                            } else {
                                sweetAlertError("Campo estado vacío.");
                            }
                        } else {
                            sweetAlertError("Campo nota vacío.");
                        }
                    } else {
                        sweetAlertError("Campo junta vacío.");
                    }
                } else {
                    sweetAlertError("Campo cliente vacío.");
                }
            } else {
                sweetAlertError("Campo empresa vacío.");
            }
        } else {
            sweetAlertError("Campo expediente vacío.");
        }
    });
});