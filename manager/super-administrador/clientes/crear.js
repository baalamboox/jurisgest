$(document).ready(() => {

    // Sección de campos obtenidos por jQuery del formulario.
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

    // Sección de alertas.
    const creacionCliente = $("#creacionCliente");

    // Sección de botones obtenidos por JQuery.
    const botonCrearCliente = $("#crearCliente");
    const botonNuevoCliente = $("#nuevoCliente");
 

    // Sección de expresiones regulares para validación de campos.
    const expresionCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const expresionNombresApellidos = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+$/;
    const expresionCalle = /^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s.,#-]+$/;
    const expresionNumeroExteriorInterior = /^[0-9]+[a-zA-Z\s-]*$/;
    const expresionColoniaCiudadEstado = /^[a-zA-ZáéíóúÁÉÍÓÚñÑäëïöüÄËÏÖÜ\s]+(?:[-\s][a-zA-Z\s]+)*$/;
    const expresionTelefonoCelular = /^(?:\d{7,10}|\d{3}\s\d{3}\s\d{4})$/;
    const expresionCodigoPostal = /^\d{5}$/;

    // Oculta el boton de crear nuevo cliente.
    botonNuevoCliente[0].hidden = true;

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

    // Asignación del evento clic al botón de nuevo cliente para mostrar lo y recargar la vista correspondiente.
    botonNuevoCliente.click(() => {
        botonNuevoCliente[0].hidden = true;
        botonCrearCliente[0].hidden = false;
        $("#contenedorSeccionesClientes").load(`${window.location.origin}/view/super-administrador/clientes/crear.php`);
    });

    // Asignación del evento clic al botón de crear cliente para su correspondiente acción.
    botonCrearCliente.click(() => {
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
                                                                                                        url: `${window.location.origin}/control/super-administrador/clientes/crear.php`,
                                                                                                        //Define los datos que se enviarán con la solicitud en forma de objeto.                                               
                                                                                                        data: {
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
                                                                                                            //Se muestra el mensaje de creado con SweetAlert 
                                                                                                            respuestaJSON.estado != 400 ? [
                                                                                                                botonCrearCliente[0].hidden = true,
                                                                                                                botonNuevoCliente[0].hidden = false,
                                                                                                                creacionCliente.attr("hidden", false)
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
});