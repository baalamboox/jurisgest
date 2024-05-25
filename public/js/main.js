window.onload = function() {

    // Selección y comparació de vistas para el manejo aleatorio de fondos para el inicio de sesión.
    const body = document.querySelector("body");
    if(window.location.pathname == "/" || window.location.pathname == "/inicio-sesion") {
        body.style.backgroundImage = `url(public/images/fondos/fondo-${Math.floor(Math.random() * 3)}.jpeg)`;
        body.style.backgroundPosition = "center";
        body.style.backgroundSize = "cover";
        body.style.backgroundRepeat = "no-repeat";
        body.style.backgroundAttachment = "fixed";
    }

    // Inicialización del uso de Tooltips (Bootstrap 4).
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
}