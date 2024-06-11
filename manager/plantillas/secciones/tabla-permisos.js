$(document).ready(() => {
    const dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        }
    });

    const botonEliminar = $(".boton-eliminar");

    const eliminarPermiso = (idExpedienteUsuario) => {
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
                    url: `${window.location.origin}/control/super-administrador/expedientes/eliminar-permiso.php`,
                    data: {
                        idExpedienteUsuario
                    },
                    success: (respuesta) => {
                        const respuestaJSON = JSON.parse(respuesta);
                        respuestaJSON.estado != 400 ? [
                            Swal.fire({
                                title: "¡Genial!",
                                text: "Eliminación del permiso correcto.",
                                icon: "success",
                                background: 'rgb(25, 21, 20)',
                                allowOutsideClick: false,

                            }),
                            $("#contenedorSeccionesExpedientes").load(`${window.location.origin}/view/super-administrador/expedientes/lista-permisos.php`)
                        ] : false;
                    }
                });
            }
        });
    }

    botonEliminar.click((event) => eliminarPermiso(event.currentTarget.id));
});