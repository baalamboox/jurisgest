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
    const expresionNombreJunta = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;

    const botonEditarJunta = $(".boton-editar");
    const botonEliminarJunta = $(".boton-eliminar");


    const editarJunta = (event, idJuntas) => {
        const columnasFilaJunta = event.currentTarget.parentNode.parentNode.cells;
        const contenedorSeccionesJuntas = $("#contenedorSeccionesJuntas");
        //Creacion del formulario actualizar de juntas
        const formularioHTML = `
            <div class="card shadow p-4 border-0">
                <div class="card-header d-flex bg-white justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user mr-2 text-gold-light"></i>
                        Actualización del Junta
                    </div>
                    <div>
                        <span class="btn btn-sm btn-dark rounded" id="cancelarJuntas"><i class="fas fa-times mr-2"></i>Cancelar</span>
                        <span class="btn btn-sm btn-gold-light rounded" id="guardarJuntas"><i class="fas fa-save mr-2"></i>Guardar</span>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="juntas">
                                        <small><i class="fas fa-users mr-2 text-gold-light"></i>Juntas</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="juntas" placeholder="Actualiza una junta|" value="${columnasFilaJunta[0].innerText}" />
                                </div>
                            </div>
                        </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        `;
        contenedorSeccionesJuntas.html(formularioHTML);

        const campoJuntas = $("#juntas");
        //boton de guardar juntas o cancelar juntas traido de los id de formulario
        const botonCancelarJunta = $("#cancelarJuntas");
        const botonGuardarJunta = $("#guardarJuntas");
        //Cancelacion de Juntas
        botonCancelarJunta.click(() => {
            $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`);
        });

        botonGuardarJunta.click(() => {
            if(campoJuntas.val() != "") {
                if (expresionNombreJunta.test(campoJuntas.val())) {
                    $.ajax({
                        type: "POST",
                        url: `${window.location.origin}/control/super-administrador/juntas/actualizar.php`,
                        data: {
                            idJuntas,
                            juntas: campoJuntas.val()
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
                                sweetAlertError("Ocurrió un error al crear al junta.")
                            ];
                        }
                    });
                } else {
                    sweetAlertError("Campo de junta inválido.");
                }
            } else {
                sweetAlertError("Campo de junta  inválido.");
            }
        });
    }

    const eliminarJunta = (idJuntas) => {
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
                        idJuntas
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación de la junta correcto.",
                                icon: "error",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,

                            }),
                            $("#contenedorSeccionesJuntas").load(`${window.location.origin}/view/plantillas/secciones/tabla-juntas.php`)
                        ] : false;
                    }
                });
            }
        });
    }

    botonEditarJunta.click((event) => editarJunta(event, event.currentTarget.id));

    botonEliminarJunta.click((event) => eliminarJunta(event.currentTarget.id));
});