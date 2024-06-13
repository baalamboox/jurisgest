$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        }
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

    // Sección de expresiones regulares para validación de campos.
    const expresionNombreJunta = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s-]+$/;

    const botonEditarJunta = $(".boton-editar");
    const botonEliminarJunta = $(".boton-eliminar");


    const editarJunta = (event, idJunta) => {
        const columnasFilaJunta = event.currentTarget.parentNode.parentNode.cells;
        const contenedorSeccionesJuntas = $("#contenedorSeccionesJuntas");
        //Creacion del formulario actualizar de juntas
        const formularioHTML = `
            <div class="card shadow p-4 border-0">
                <div class="card-header d-flex flex-column flex-sm-row bg-white justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-handshake mr-2 text-gold-light"></i>
                        Actualización de la junta
                    </div>
                    <div class="mx-auto mx-sm-0 mt-3 mt-sm-0 mb-2 mb-sm-0">
                        <span class="btn btn-sm btn-dark rounded" id="cancelarJunta"><i class="fas fa-times mr-2"></i>Cancelar</span>
                        <span class="btn btn-sm btn-gold-light rounded" id="guardarJunta"><i class="fas fa-save mr-2"></i>Guardar</span>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombreJunta">
                                        <small><i class="fas fa-location-arrow mr-2 text-gold-light"></i>Junta</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="nombreJunta" placeholder="Ingresa nombre de la junta" value="${columnasFilaJunta[1].innerText}" />
                                </div>
                            </div>
                        </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        `;
        contenedorSeccionesJuntas.html(formularioHTML);

        const campoNombreJunta = $("#nombreJunta");
        //boton de guardar juntas o cancelar juntas traido de los id de formulario
        const botonCancelarJunta = $("#cancelarJunta");
        const botonGuardarJunta = $("#guardarJunta");
        //Cancelacion de Juntas
        botonCancelarJunta.click(() => {
            $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`);
        });

        botonGuardarJunta.click(() => {
            if(campoNombreJunta.val() != "") {
                if (expresionNombreJunta.test(campoNombreJunta.val())) {
                    $.ajax({
                        type: "POST",
                        url: `${window.location.origin}/control/super-administrador/juntas/actualizar.php`,
                        data: {
                            idJunta,
                            nombreJunta: campoNombreJunta.val()
                        },
                        success: respuesta => {
                            const respuestaJSON = JSON.parse(respuesta);
                            respuestaJSON.estado != 400 ? [
                                Swal.fire({
                                    title: "¡Genial!",
                                    text: "Actualización de la junta correcta.",
                                    icon: "success",
                                    background: 'rgb(25, 21, 20)',
                                    allowOutsideClick: false,
                                }),
                                $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`)
                            ] : [
                                sweetAlertError("Ocurrió un error al actualizar la junta.")
                            ];
                        }
                    });
                } else {
                    sweetAlertError("Campo junta inválido.");
                }
            } else {
                sweetAlertError("Campo junta  vacío.");
            }
        });
    }

    const eliminarJunta = (idJunta) => {
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
                console.log(resultado);
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/juntas/eliminar.php`,
                    data: {
                        idJunta
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación de la junta correcta.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,
                            }),
                            $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`)
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

    botonEditarJunta.click((event) => editarJunta(event, event.currentTarget.id));

    botonEliminarJunta.click((event) => eliminarJunta(event.currentTarget.id));
});