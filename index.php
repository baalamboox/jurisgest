<!DOCTYPE html>
<html lang="es-MX" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo ucfirst($_GET["vista_solicitada"]); ?></title>
        <?php
            // Se mandan a llamar las configuraciones necesarias.
            require_once "config/configuracion.php";
            require_once "config/dependencias.php";
        ?>
    </head>
    <body>
    <?php
        // Verificación de las rutas amigables.
        if(isset($_GET["vista_solicitada"])) {
            echo "vista cargada correctamente!";
        } else {
            echo "vista cargada erroneamente!";
        }
    ?>
    </body>
</html>