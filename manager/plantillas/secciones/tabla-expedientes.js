$(document).ready(() => {
    // Obteneción de los elementos HTML relacionados con el filtro de fechas con JQuery.
    const campoFechaInicial = $("#fechaInicial");
    const campoFechaFinal = $("#fechaFinal");

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
                            columns: [1, 2, 3, 4, 5, 6],
                            
                        },
                        className: "btn-gold-light mb-1 btn-sm border-0",
                        text: '<i class="fas fa-print mr-2"></i>Imprimir',
                        title: "Lista de expedientes"
                        
                    },
                ]
            }
        },
    });

    // Filtrado personalizado para rango de fechas de los expedientes.
    dataTable.columns(7).search.fixed('range', (data) => {
        if (
            (campoFechaInicial.val() == "" && campoFechaFinal.val() == "") ||
            (campoFechaInicial.val() == "" && data <= campoFechaFinal.val()) ||
            (campoFechaInicial.val() <= data && campoFechaFinal.val() == "") ||
            (campoFechaInicial.val() <= data && data <= campoFechaFinal.val())
        ) {
            return true;
        }
        return false;
    });

    // Asiganación de lo eventos de cambio para lo selectores de fechas.
    campoFechaInicial.change(() => dataTable.draw());
    campoFechaFinal.change(() => dataTable.draw());

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

    //Funcion de editar expedientes
    const editarExpediente = (event, idExpediente) => {
        // Obtiene las celdas de la fila actual donde ocurrió el evento
        const celda = event.currentTarget.parentNode.parentNode.cells;
        // Define el formulario HTML para la edición del expediente
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
           // Muestra una alerta de SweetAlert con el formulario de edición
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
            // Si el usuario confirma la acción
            if(resultado.isConfirmed) {
                // Obtiene los valores de los campos del formulario
                const campoNota = $("#nota");
                const listaEstado = $("#listaEstado");
                // Verifica que el campo de la nota no esté vacío
                if(campoNota.val() != "") {
                    // Envía una solicitud AJAX para actualizar el expediente
                    $.ajax({
                        //Especifica que la solicitud será de tipo POST.
                        type: "POST",
                        //Define la URL a la que se enviará la solicitud. 
                        url: `${window.location.origin}/control/super-administrador/expedientes/actualizar.php`,
                        //Define los datos que se enviarán con la solicitud en forma de objeto.
                        data: {
                            idExpediente,
                            nota: campoNota.val(),
                            estado: listaEstado.val(),
                        },
                        success: respuesta => {
                            // Analiza la respuesta JSON del servidor
                            const respuestaJSON = JSON.parse(respuesta);
                            // Si la actualización fue exitosa
                            respuestaJSON.estado != 400 ? [
                                // Muestra una alerta de éxito
                                Swal.fire({
                                    title: "¡Genial!",
                                    text: "Actualización de expediente correcta.",
                                    icon: "success",
                                    background: 'rgb(25, 21, 20)',
                                    allowOutsideClick: false,
                                }),
                                // Recarga la tabla de expedientes
                                $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`)
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
                    // Si el campo de la nota está vacío, muestra una alerta de error
                } else {
                    sweetAlertError("Campo nota vacío.");
                }
            }
        });
    }
    //Función para manejar la eliminación de un expediente.
    const eliminarJunta = (idExpediente) => {
        // Muestra un cuadro de diálogo de confirmación al usuario
        Swal.fire({
            title: "¿Estas seguro?",
            text: "¡No se podrá revertir!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, borrar",
            background: 'rgb(25, 21, 20)',
            allowOutsideClick: false,
        }).then((resultado) => {
            // Si el usuario confirma la eliminación
            if (resultado.isConfirmed) {
                console.log(resultado);
                // Envía una solicitud AJAX para eliminar el expediente
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/expedientes/eliminar.php`,
                    data: {
                        idExpediente
                    },
                    success: (respuesta) => {
                        // Analiza la respuesta JSON del servidor
                        const respuestaJSON = JSON.parse(respuesta);
                        // Si la eliminación fue exitosa
                        respuestaJSON.estado != 400 ? [
                        // Muestra una alerta de éxito
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación del expediente correcta.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,
                            }),
                        // Recarga la tabla de expedientes
                            $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-expedientes.php`)
                        ] : false;
                    }
                });
            }
        });
    }

    // Añade un manejador de evento de clic al botón de editar expediente
    botonEditarExpediente.click((event) => editarExpediente(event, event.currentTarget.id));

    // Añade un manejador de evento de clic al botón de eliminar JUnta
    botonEliminarExpediente.click((event) => eliminarJunta(event.currentTarget.id));
});