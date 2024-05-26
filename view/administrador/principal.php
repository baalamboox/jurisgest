<?php
    // Se usa el método siguiente para poder hacer uso de las varables de sesión.
    session_start();
    
    // Verifica si hay un usuario con sesión activa así como su perfil.
    if(isset($_SESSION["usuario"])) {
        if($_SESSION["perfil"] == 2) {
?>
<div class="d-flex flex-column mvh-100">

    <!-- Se manda a llamar el encabezado -->
    <?php require_once "view/plantillas/encabezado.php"; ?>

    <!-- Aquí empieza la sección del contenido principal. -->
    <div class="container d-flex flex-column flex-grow-1 py-5 z-index-1" id="contenedorSecciones">

    </div>

    <!-- Se manda a llamar el pie de página. -->
    <?php require_once "view/plantillas/pie-pagina.php"; ?>
</div>

<?php
        } else {
            header("location:" . $_SESSION["ruta"]);
            exit();
        }
    } else {
        header("location:inicio-sesion");
        exit();
    }
    
?>