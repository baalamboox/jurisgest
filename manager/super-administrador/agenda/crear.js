$(document).ready(() => {
    // Obtención de los elementos HTML con Jquery.
    const botonCrearAudiencia = $("#crearAudiencia");
    const botonNuevaAudiencia = $("#nuevaAudiencia");
    const campoNombreAudiencia = $("#nombreAudiencia");
    const listaExpedientes = $("#listaExpedientes");
    const campoFechaAudiencia = $("#fechaAudiencia");
    const campoComentario = $("#comentario");

    // Sección de alertas.
    const creacionAudiencia = $("#creacionAudiencia");

    // Oculta el boton de crear nueva audiencia.
    botonNuevaAudiencia[0].hidden = true;

    // Implementación de la librería chosen.
    listaExpedientes.chosen({
        no_results_text: "No se encontró: ",
        width: "100%"
    });

    // Configuración de la librería FlatPickr para selección de fechas y horas.
    campoFechaAudiencia.flatpickr({
        enableTime: true,
        minDate: "today",
        locale: {
            weekdays: {
                shorthand: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                longhand: [
                    "Domingo",
                    "Lunes",
                    "Martes",
                    "Miércoles",
                    "Jueves",
                    "Viernes",
                    "Sábado",
                ],
            },
            months: {
                shorthand: [
                    "Ene",
                    "Feb",
                    "Mar",
                    "Abr",
                    "May",
                    "Jun",
                    "Jul",
                    "Ago",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dic",
                ],
                longhand: [
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre",
                ],
            },
        },
        ordinal: function () {
            return "º";
        },
        firstDayOfWeek: 1,
        rangeSeparator: " a ",
        time_24hr: false,  
        dateFormat: "Y-m-d H:i",
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

    // Asignación del evento clic al botón de nueva audiencia para mostrar lo y recargar la vista correspondiente.
    botonNuevaAudiencia.click(() => {
        botonNuevaAudiencia[0].hidden = true;
        botonCrearAudiencia[0].hidden = false;
        $("#contenedorSeccionesAudiencias").load(`${window.location.origin}/view/super-administrador/agenda/crear.php`);
    });

    // Asignación del evento clic al botón crear nueva audiencia.
    botonCrearAudiencia.click(() => {
        if(campoNombreAudiencia.val() != "") {
            if(listaExpedientes.val() != 0) {
                if(campoFechaAudiencia.val() != "") {
                    if(campoComentario.val() != "") {
                        $.ajax({
                            type: "POST",
                            url: `${window.location.origin}/control/super-administrador/agenda/crear.php`,
                            data: {
                                nombreAudiencia: campoNombreAudiencia.val(),
                                expedienteID: listaExpedientes.val(),
                                fechaAudiencia: campoFechaAudiencia.val(),
                                comentario: campoComentario.val()
                            },
                            success: respuesta => {
                                const respuestaJSON = JSON.parse(respuesta);
                                respuestaJSON.estado != 400 ? [
                                    botonCrearAudiencia[0].hidden = true,
                                    botonNuevaAudiencia[0].hidden = false,
                                    creacionAudiencia.attr("hidden", false)
                                ] : [
                                    sweetAlertError("Ocurrió un error al crear la audiencia.")
                                ];
                            }
                        });
                    } else {
                        sweetAlertError("Campo comentario vacío.");
                    }
                } else {
                    sweetAlertError("Campo fecha audiencia vacío.");
                }
            } else {
                sweetAlertError("Campo expediente vacío.");
            }
        } else {
            sweetAlertError("Campo nombre audiencia vacío.");
        }
    });
});