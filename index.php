<!DOCTYPE html>
<html lang="es-MX" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Se obtiene la vista solicitada y se muestra como título de la pestaña. -->
        <title>
            dh
        </title>
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
                        require_once "view/autenticacion/iniciar-sesion.php";
                        break;
                    case "super-administrador":
                        require_once "view/super-administrador/principal.php";
                        break;
                    case "administrador":
                        require_once "view/administrador/principal.php";
                        break;
                    case "usuario":
                        require_once "view/usuario/principal.php";
                        break;
                    default:
                        require_once "view/plantillas/error-404.php";
                        break;
                }
            } else {
                header("location:inicio-sesion");
                exit();
            }
        ?>
    </body>
</html>0