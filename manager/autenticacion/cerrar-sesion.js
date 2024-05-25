// Función global encargada del manejo de cierre de sesión.
function cerrarSesion() {
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        html: '<small class="text-white">Cerrarás sesión.</small>',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: "Sí",
        background: 'rgb(25, 21, 20)',
        allowOutsideClick: false
    }).then((resultado) => {
        if (resultado.isConfirmed) {
            $.ajax({
                type: "POST",
                url: `${window.location.origin}/control/autenticacion/cerrar-sesion.php`,
                success: respuesta => {
                    const respuestaJSON = JSON.parse(respuesta);
                    respuestaJSON.estado == 200 && (window.location.href = "inicio-sesion");
                }
            });
        }
    });
}