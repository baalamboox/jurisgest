$(document).ready(() => {
    const botonCambiarContra = $(".boton-cambiar-contra");
    botonCambiarContra.click(() => {
        Swal.fire({
            title: "Cambiar contraseña",
            input: "text",
            input :"password",
            inputAttributes: {
                autocapitalize: "off",
            },
            showCancelButton: true,
            confirmButtonText: "",
            background: 'rgb(25, 21, 20)',
            showLoaderOnConfirm: true,
            preConfirm: async (login) => {
                try {
                    const urlCambiarContra= `${window.location.origin}/control/autenticacion/cambiar-contra.php`;
                    const response = await fetch(urlCambiarContra);
                    if (!response.ok) {
                        return Swal.showValidationMessage(`
                    ${JSON.stringify(await response.json())}
                `);
                    }
                    return response.json();
                } catch (error) {
                    Swal.showValidationMessage(`
                    Request failed: ${error}
                `);
                }
            },
            allowOutsideClick: () => !Swal.isLoading(),
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url,
                });
            }
        });
    });

});
