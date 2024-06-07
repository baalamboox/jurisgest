$(document).ready(() => {

    // Sección de campos obtenidos por jQuery del formulario.
    const campoJunta = $("#juntas");
    // Sección de alertas.
    const creacionJunta = $("#creacionJunta");

    // Sección de botones obtenidos por JQuery.
    const botonCrearJunta = $("#crearJunta");
    const botonNuevoJunta = $("#nuevoJunta");
 

    // Sección de expresiones regulares para validación de campos.

    const expresionNombrejunta = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;
    
    // Oculta el boton de crear nueva junta.
    botonNuevoJunta[0].hidden = true;

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

    // Asignación del evento clic al botón de nuevo junta para mostrar lo y recargar la vista correspondiente.
        botonNuevoJunta.click(() => {
        botonNuevoJunta[0].hidden = true;
        botonCrearJunta[0].hidden = false;
        $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/super-administrador/juntas/crear.php`);
    });

    // Asignación del evento clic al botón de crear cliente para su correspondiente acción.
    botonCrearJunta.click(() => {
        if(campoJunta.val() != "") {
            if (expresionNombrejunta.test(campoJunta.val())) {
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/juntas/crear.php`,
                    data: {
                        juntas: campoJunta.val()
                    },
                    success: respuesta => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            botonCrearJunta[0].hidden = true,
                            botonNuevoJunta[0].hidden = false,
                            creacionJunta.attr("hidden", false)
                        ] : [
                            sweetAlertError("Ocurrió un error al crear el cliente.")
                        ];
                    }
                });
            } else {
                sweetAlertError("Campo junta inválido.");
            }
        } else {
            sweetAlertError("Campo inválido.");
        }
    });
});