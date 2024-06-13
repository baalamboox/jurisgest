$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        }
    });

    const botonEliminar = $(".boton-eliminar");
    //Función para manejar la eliminación de un junta
    const eliminarPermiso = (idExpedienteUsuario) => {
            // Muestra un cuadro de diálogo de confirmación de permiso
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
                // Envía una solicitud AJAX para eliminar junta
                $.ajax({
                    type: "POST",
                    url: `${window.location.origin}/control/super-administrador/expedientes/eliminar-permiso.php`,
                    data: {
                        idExpedienteUsuario
                    },
                    success: (respuesta) => {
                        // Analiza la respuesta JSON del servidor
                        const respuestaJSON = JSON.parse(respuesta);
                        // Si la eliminación fue exitosa
                        respuestaJSON.estado != 400 ? [
                        // Muestra una alerta de éxito
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación del permiso correcto.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,
                            }),
                            // Recarga la tabla de Junta
                            $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/lista-permisos.php`)
                        ] : false;
                    }
                });
            }
        });
    }
    // Añade un manejador de evento de clic al botón de eliminar JUnta
    botonEliminar.click((event) => eliminarPermiso(event.currentTarget.id));
});