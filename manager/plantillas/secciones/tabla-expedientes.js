$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        },
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            
                        },
                        className: "btn-gold-light mb-1 btn-sm border-0",
                        text: '<i class="fas fa-print mr-2"></i>Imprimir',
                        title: "Lista de Expedientes"
                        
                    },
                ]
            }
        },
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

    const botonEditarExpediente = $(".boton-editar");
    const botonEliminarExpediente = $(".boton-eliminar");


    const editarExpediente = (event, idExpediente) => {
        const celda = event.currentTarget.parentNode.parentNode.cells;
        const formularioHTML = `
            <form class="text-left px-4 pt-5 text-white">
                <div class="form-group">
                    <label for="nota">
                        <small><i class="fas fa-sticky-note mr-2 text-gold-light"></i>Nota</label></small>
                    <input type="email" class="form-control form-control-sm" id="nota" placeholder="Ingresa la nota" value="${celda[5].innerText}" />
                </div>
                <div class="form-group">
                    <label for="listaEstado">
                        <small><i class="fas fa-lightbulb mr-2 text-gold-light"></i>Estado</small>
                    </label>
                    <select class="form-control form-control-sm" id="listaEstado">
                        ${
                            celda[6].innerText == "Abierto" ? `<option value="${celda[6].innerText}">${celda[6].innerText}</option><option value="Cerrado">Cerrado</option>` : `<option value="${celda[6].innerText}">${celda[6].innerText}</option><option value="Abierto">Abierto</option>`
                        }
                    </select>
                </div>
            </form>
        `;
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
                const campoNota = $("#nota");
                const listaEstado = $("#listaEstado");

                if(campoNota.val() != "") {
                    $.ajax({
                        type: "POST",
                        url: `${window.location.origin}/control/super-administrador/expedientes/actualizar.php`,
                        data: {
                            idExpediente,
                            nota: campoNota.val(),
                            estado: listaEstado.val(),
                        },
                        success: respuesta => {
                            const respuestaJSON = JSON.parse(respuesta);
                            respuestaJSON.estado != 400 ? [
                                Swal.fire({
                                    title: "¡Genial!",
                                    text: "Actualización de expediente correcta.",
                                    icon: "success",
                                    background: 'rgb(25, 21, 20)',
                                    allowOutsideClick: false,
                                }),
                                $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`)
                            ] : false;
                        }
                    });
                } else {
                    sweetAlertError("Campo nota vacío.");
                }
            }
        });
    }

    const eliminarJunta = (idExpediente) => {
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
                    url: `${window.location.origin}/control/super-administrador/expedientes/eliminar.php`,
                    data: {
                        idExpediente
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación del expediente correcta.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,
                            }),
                            $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`)
                        ] : false;
                    }
                });
            }
        });
    }

    botonEditarExpediente.click((event) => editarExpediente(event, event.currentTarget.id));

    botonEliminarExpediente.click((event) => eliminarJunta(event.currentTarget.id));
});