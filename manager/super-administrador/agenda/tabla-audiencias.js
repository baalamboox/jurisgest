$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        }
    });
    
    // Obtención del botón eliminar de cada registro.
    const botonEliminar = $(".boton-eliminar");

    // Función para poder eliminar las audiencias.
    const eliminarAudiencia = (idAudiencia) => {
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
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/agenda/eliminar.php`,
                    data: {
                        idAudiencia
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación de la audiencia correcta.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,

                            }),
                            $("#contenedorSeccionesAudiencias").load(`${window.location.origin}/view/super-administrador/agenda/tabla-audiencias.php`)
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
    };

    // Asignación del evento clic para el botón eliminar audiencia.
    botonEliminar.click((event) => eliminarAudiencia(event.currentTarget.id));
});