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
    const expresionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const expresionNombresApellidos = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;
    const expresionCalle = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s.,#-]+$/;
    const expresionNumeroExteriorInterior = /^[0-9]+[a-zA-Z\s-]*$/;
    const expresionColoniaCiudadEstado = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+(?:[-\s][a-zA-Z\s]+)*$/;
    const expresionTelefonoCelular = /^(?:\d{7,10}|\d{3}\s\d{3}\s\d{4})$/;
    const expresionCodigoPostal = /^\d{5}$/;

    const botonEditar = $(".boton-editar");
    const botonEliminar = $(".boton-eliminar");

    
    const editarCliente = (event, idCliente) => {
        // Acceder a las celdas de la fila actual donde ocurrió el evento
        const columnasFila = event.currentTarget.parentNode.parentNode.cells;
        // Acceder al contenedor de secciones de clientes mediante su ID
        const contenedorSeccionesClientes = $("#contenedorSeccionesClientes");
        //Formulario HTML para actualizar los  datos  del cliente
        const formularioHTML = `
            <div class="card shadow p-4 border-0">
                <div class="card-header d-flex flex-column flex-sm-row bg-white justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user mr-2 text-gold-light"></i>
                        Actualización del cliente
                    </div>
                    <div class="mx-auto mx-sm-0 mt-3 mt-sm-0 mb-2 mb-sm-0">
                        <span class="btn btn-sm btn-dark rounded" id="cancelarCliente"><i class="fas fa-times mr-2"></i>Cancelar</span>
                        <span class="btn btn-sm btn-gold-light rounded" id="guardarCliente"><i class="fas fa-save mr-2"></i>Guardar</span>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">
                                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="nombres" placeholder="Ingresa nombre(s)" value="${columnasFila[1].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidoPaterno">
                                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellido paterno</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="apellidoPaterno" placeholder="Ingresa apellido paterno" value="${columnasFila[2].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidoMaterno">
                                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellido materno</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="apellidoMaterno" placeholder="Ingresa apellido materno" value="${columnasFila[3].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="calle">
                                        <small><i class="fas fa-road mr-2 text-gold-light"></i>Calle</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="calle" placeholder="Ingresa calle" value="${columnasFila[4].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numeroExterior">
                                        <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Número exterior</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="numeroExterior" placeholder="Ingresa número" value="${columnasFila[6].innerText == "S/N Ext." ? "" : columnasFila[6].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="numeroInterior">
                                        <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Número interior</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="numeroInterior" placeholder="Ingresa número" value="${columnasFila[5].innerText == "S/N Int." ? "" : columnasFila[5].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colonia">
                                        <small><i class="fas fa-city mr-2 text-gold-light"></i>Colonia</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="colonia" placeholder="Ingresa colonia" value="${columnasFila[7].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ciudad">
                                        <small><i class="fas fa-university mr-2 text-gold-light"></i>Ciudad</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="ciudad" placeholder="Ingresa ciudad" value="${columnasFila[9].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="estado">
                                        <small><i class="fas fa-flag mr-2 text-gold-light"></i>Estado</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="estado" placeholder="Ingresa estado" value="${columnasFila[10].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigoPostal">
                                        <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Código postal</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="codigoPostal" placeholder="Ingresa código postal" value="${columnasFila[8].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono1">
                                        <small><i class="fas fa-phone-alt mr-2 text-gold-light"></i>Teléfono 1</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="telefono1" placeholder="Ingresa teléfono" value="${columnasFila[11].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefono2">
                                        <small><i class="fas fa-phone-alt mr-2 text-gold-light"></i>Teléfono 2</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="telefono2" placeholder="Ingresa teléfono" value="${columnasFila[12].innerText == "S/N Tel." ? "" : columnasFila[12].innerText}" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="celular">
                                        <small><i class="fas fa-mobile mr-2 text-gold-light"></i>Celular</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="celular" placeholder="Ingresa celular" value="${columnasFila[13].innerText == "S/N Cel." ? "" : columnasFila[13].innerText}" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correoElectronico">
                                        <small><i class="fas fa-at mr-2 text-gold-light"></i>Correo electrónico</small>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" id="correoElectronico" placeholder="Ingresa correo electrónico" value="${columnasFila[14].innerText == "S/D Correo." ? "" : columnasFila[14].innerText}" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        `;
        // Establecer el contenido HTML del contenedor de secciones de clientes con el formulario HTML proporcionado
        contenedorSeccionesClientes.html(formularioHTML);

        // Obtener referencias a los campos del formulario por su ID
        const campoNombres = $("#nombres");
        const campoApellidoPaterno = $("#apellidoPaterno");
        const campoApellidoMaterno = $("#apellidoMaterno");
        const campoCalle = $("#calle");
        const campoNumeroExterior = $("#numeroExterior");
        const campoNumeroInterior = $("#numeroInterior");
        const campoColonia = $("#colonia");
        const campoCiudad = $("#ciudad");
        const campoEstado = $("#estado");
        const campoCodigoPostal = $("#codigoPostal");
        const campoTelefono1 = $("#telefono1");
        const campoTelefono2 = $("#telefono2");
        const campoCelular = $("#celular");
        const campoCorreoElectronico = $("#correoElectronico");


        // Obtener referencias a los botones de cancelar y guardar el cliente por su ID
        const botonCancelarCliente = $("#cancelarCliente");
        const botonGuardarCliente = $("#guardarCliente");

        // Agregar un manejador de evento de clic al botón de cancelar cliente
        botonCancelarCliente.click(() => {
            // Cargar la tabla de clientes en el contenedor de secciones de clientes
            $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-clientes.php`);
        });
        // Agregar un manejador de evento de clic al botón de Guardar cliente
        botonGuardarCliente.click(() => {
            //Validacion de los campos vacios 
            if(campoNombres.val() != "") {
                if(campoApellidoPaterno.val() != "") {
                    if(campoApellidoMaterno.val() != "") {
                        if(campoCalle.val() != "") {
                            if(campoColonia.val() != "") {
                                if(campoCiudad.val() != "") {
                                    if(campoEstado.val() != "") {
                                        if(campoCodigoPostal.val() != "") {
                                            if(campoTelefono1.val() != "") {
                                                if(expresionNombresApellidos.test(campoNombres.val())) {
                                                    if(expresionNombresApellidos.test(campoApellidoPaterno.val())) {
                                                        if(expresionNombresApellidos.test(campoApellidoPaterno.val())) {
                                                            if(expresionCalle.test(campoCalle.val())) {
                                                                if(expresionNumeroExteriorInterior.test(campoNumeroExterior.val()) || campoNumeroExterior.val() == "") {
                                                                    if(expresionNumeroExteriorInterior.test(campoNumeroInterior.val()) || campoNumeroInterior.val() == "") {
                                                                        if(expresionColoniaCiudadEstado.test(campoColonia.val())) {
                                                                            if(expresionColoniaCiudadEstado.test(campoCiudad.val())) {
                                                                                if(expresionColoniaCiudadEstado.test(campoEstado.val())) {
                                                                                    if(expresionCodigoPostal.test(campoCodigoPostal.val())) {
                                                                                        if(expresionTelefonoCelular.test(campoTelefono1.val())) {
                                                                                            if(expresionTelefonoCelular.test(campoTelefono2.val()) || campoTelefono2.val() == "") {
                                                                                                if(expresionTelefonoCelular.test(campoCelular.val()) || campoCelular.val() == "") {
                                                                                                    if(expresionCorreo.test(campoCorreoElectronico.val()) || campoCorreoElectronico.val() == "") {
                                                                                                          //Inicia una petición AJAX utilizando el método $.ajax de jQuery.
                                                                                                        $.ajax({
                                                                                                            //Especifica que la solicitud será de tipo POST.
                                                                                                            type: "POST",
                                                                                                            //Define la URL a la que se enviará la solicitud. 
                                                                                                            url: `${window.location.origin}/control/super-administrador/clientes/actualizar.php`,
                                                                                                            //Define los datos que se enviarán con la solicitud en forma de objeto.
                                                                                                            data: {
                                                                                                                idCliente,
                                                                                                                nombres: campoNombres.val(),
                                                                                                                apellidoPaterno: campoApellidoPaterno.val(),
                                                                                                                apellidoMaterno: campoApellidoMaterno.val(),
                                                                                                                calle: campoCalle.val(),
                                                                                                                numeroExterior: campoNumeroExterior.val() == "" ? "S/N Ext." : campoNumeroExterior.val(),
                                                                                                                numeroInterior: campoNumeroInterior.val() == "" ? "S/N Int." : campoNumeroInterior.val(),
                                                                                                                colonia: campoColonia.val(),
                                                                                                                ciudad: campoCiudad.val(),
                                                                                                                estado: campoEstado.val(),
                                                                                                                codigoPostal: campoCodigoPostal.val(),
                                                                                                                telefono1: campoTelefono1.val(),
                                                                                                                telefono2: campoTelefono2.val() == "" ? "S/N Tel." : campoTelefono2.val(),
                                                                                                                celular: campoCelular.val() == "" ? "S/N Cel." : campoCelular.val(),
                                                                                                                correoElectronico: campoCorreoElectronico.val() == "" ? "S/D Correo." : campoCorreoElectronico.val()
                                                                                                            },
                                                                                                            //Define una función de callback que se ejecutará si la solicitud es exitosa. Esta función toma un parámetro respuesta.
                                                                                                            success: respuesta => {
                                                                                                                //Convierte la respuesta de la solicitud (que se asume es una cadena JSON) en un objeto JavaScript.
                                                                                                                const respuestaJSON = JSON.parse(respuesta);
                                                                                                                //Se muestra el mensaje de actualizo con SweetAlert 
                                                                                                                respuestaJSON.estado != 400 ? [
                                                                                                                    // Muestra una alerta de éxito
                                                                                                                    Swal.fire({
                                                                                                                        title: "¡Genial!",
                                                                                                                        text: "Actualización del cliente correcta.",
                                                                                                                        icon: "success",
                                                                                                                        background: 'rgb(25, 21, 20)',
                                                                                                                        allowOutsideClick: false,
                                                                                                                    }),
                                                                                                                     // Recarga la tabla de Cliente
                                                                                                                    $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-clientes.php`)
                                                                                                                ] : [
                                                                                                                    sweetAlertError("Ocurrió un error al crear el cliente.")
                                                                                                                ];
                                                                                                            }
                                                                                                        });
                                                                                                    } else {
                                                                                                        sweetAlertError("Campo correo electrónico inválido.");
                                                                                                    }
                                                                                                } else {
                                                                                                    sweetAlertError("Campo celular inválido.");
                                                                                                }
                                                                                            } else {
                                                                                                sweetAlertError("Campo teléfono 2 inválido.");
                                                                                            }
                                                                                        } else {
                                                                                            sweetAlertError("Campo teléfono 1 inválido.");
                                                                                        }
                                                                                    } else {
                                                                                        sweetAlertError("Campo código postal inválido.");
                                                                                    }
                                                                                } else {
                                                                                    sweetAlertError("Campo estado inválido.");
                                                                                }
                                                                            } else {
                                                                                sweetAlertError("Campo municipio inválido.");
                                                                            }
                                                                        } else {
                                                                            sweetAlertError("Campo colonia inválido.");
                                                                        }
                                                                    } else {
                                                                        sweetAlertError("Campo número interior inválido.");
                                                                    }
                                                                } else {
                                                                    sweetAlertError("Campo número exterior inválido.");
                                                                }
                                                            } else {
                                                                sweetAlertError("Campo calle inválido.");
                                                            }
                                                        } else {
                                                            sweetAlertError("Campo apellido materno inválido.");
                                                        }
                                                    } else {
                                                        sweetAlertError("Campo apellido paterno inválido.");
                                                    }
                                                } else {
                                                    sweetAlertError("Campo nombre(s) inválido.");
                                                }
                                            } else {
                                                sweetAlertError("Campo teléfono 1 vacío.");
                                            }
                                        } else {
                                            sweetAlertError("Campo código postal vacío.");
                                        }
                                    } else {
                                        sweetAlertError("Campo estado vacío.");
                                    }
                                } else {
                                    sweetAlertError("Campo municipio vacío.");
                                }
                            } else {
                                sweetAlertError("Campo colonia vacío.");
                            }
                        } else {
                            sweetAlertError("Campo calle vacío.");
                        }
                    } else {
                        sweetAlertError("Campo apellido materno vacío.");
                    }
                } else {
                    sweetAlertError("Campo apellido paterno vacío.");
                }
            } else {
                sweetAlertError("Campo nombre(s) vacío.");
            }
        });
    }
    // Función para eliminar un cliente
    const eliminarCliente = (idCliente) => {
        // Mostrar un cuadro de diálogo de confirmación al usuario
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
                // Enviar una solicitud AJAX para eliminar el cliente
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/clientes/eliminar.php`,
                    data: {
                        idCliente
                    },
                    success: (respuesta) => {
                        // Analiza la respuesta JSON del servidor
                        const respuestaJSON = JSON.parse(respuesta);
                        // Si la eliminación fue exitosa
                        respuestaJSON.estado != 400 ? [
                            // Muestra una alerta de éxito
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación del cliente correcto.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,
                            }),
                            // Cargar la tabla actualizada de clientes en el contenedor de secciones de clientes
                            $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/plantillas/secciones/tabla-clientes.php`)
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
    // Añade un manejador de evento de clic al botón de editar cliente
    botonEditar.click((event) => editarCliente(event, event.currentTarget.id));
    // Añade un manejador de evento de clic al botón de eliminar cliente
    botonEliminar.click((event) => eliminarCliente(event.currentTarget.id));
});