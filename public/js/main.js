window.onload = function() {
    const body = document.querySelector("body");
    if(window.location.pathname == "/" || window.location.pathname == "/inicio-sesion") {
        body.style.backgroundImage = `url(public/images/fondos/fondo-${Math.floor(Math.random() * 3)}.jpeg)`;
        body.style.backgroundPosition = "center";
        body.style.backgroundSize = "cover";
        body.style.backgroundRepeat = "no-repeat";
        body.style.backgroundAttachment = "fixed";
    }
}