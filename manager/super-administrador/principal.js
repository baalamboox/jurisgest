$(document).ready(() => {
    $("#contenedorSecciones").load("../../view/plantillas/secciones/inicio.php")
    $("#botonInicio").click(() => {
        $("#contenedorSecciones").load("../../view/plantillas/secciones/inicio.php")
    })
    
})
$(document).ready(() => {
    $("#contenedorSecciones").load("../../view/plantillas/secciones/contactanos.php")
    $("#botonContactanos").click(() => {
        $("#contenedorSecciones").load("../../view/plantillas/secciones/contactanos.php")
    })
    
})