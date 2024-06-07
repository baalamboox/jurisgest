$(document).ready(() => {

    // Sección de campos obtenidos por jQuery del formulario.
    const campoNombreJunta = $("#nombreJunta");
    // Sección de alertas.
    const creacionJunta = $("#creacionJunta");

    // Sección de botones obtenidos por JQuery.
    const botonCrearJunta = $("#crearJunta");
    const botonNuevaJunta = $("#nuevaJunta");
 

    // Sección de expresiones regulares para validación de campos.

    const expresionNombreJunta = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s-]+$/;
    
    // Oculta el boton de crear nueva junta.
    botonNuevaJunta[0].hidden = true;

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

    // Asignación del evento clic al botón de nueva junta para mostrar lo y recargar la vista correspondiente.
        botonNuevaJunta.click(() => {
        botonNuevaJunta[0].hidden = true;
        botonCrearJunta[0].hidden = false;
        $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/super-administrador/juntas/crear.php`);
    });

    // Asignación del evento clic al botón de crear junta para su correspondiente acción.
    botonCrearJunta.click(() => {
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