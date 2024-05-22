<!DOCTYPE html>
<html lang="es-MX" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Se obtiene la vista solicitada y se muestra como título de la pestaña. -->
        <title><?php echo ucfirst($_GET["vista_solicitada"]); ?></title>
        <?php
            // Se mandan a llamar las configuraciones necesarias así como dependencias.
            require_once "config/configuracion.php";
            require_once "config/dependencias.php";
        ?>
    </head>
    <body>
    <?php
        // Verificación de las rutas amigables.
        if(isset($_GET["vista_solicitada"])) {
            switch ($_GET["vista_solicitada"]) {
                case "inicio-sesion":
                    include_once "view/autenticacion/iniciar-sesion.php";
                    break;
                case "plantilla":
                    include_once "view/plantillas/plantilla.php";
                    break;
                default:
                    # code...
                    break;
            }
        } else {
            include_once "view/autenticacion/iniciar-sesion.php";
        }
    ?>
    </body>
</html>