<?php

    // Se usa el método siguiente para poder hacer uso de las varables de sesión.
    session_start();

    // Importación del archivo de configuración (conexión) a la base de datos.
    require_once "../../config/database/Conexion.php";

    // Instancia de la clase Conexion() y uso de la función obtener().
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos enviados por AJAX desde formulario inicio sesión.
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];

    // Consulta para verificar si el usuario y contraseña existan.
    $sql = "SELECT id, usr, aco, perf FROM tbl_usr WHERE usr = :usuario";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(':usuario', $usuario);
    $consulta->execute();

    // Aquí se almacena el resultado de la consulta.
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    // Aquí empieza toda la logica para la validación del usuario y contraseña.
    if($resultado) {
        if(password_verify($contra, $resultado["aco"])) {

            // Asignación a variables de sesión con los datos del usuario autenticado.
            $_SESSION["identificador"] = $resultado["id"]; 
            $_SESSION["usuario"] = $resultado["usr"];
            $_SESSION["perfil"] = $resultado["perf"];

            // Verifica a que perfil pertenece cada sesión.
            switch($resultado["perf"]) {
                case 1:
                    $_SESSION["tipo"] = "Super Administrador";
                    $_SESSION["ruta"] = "super-administrador";
                    echo json_encode([
                        "estado" => 200,
                        "mensaje" => "Inicio de sesión autorizado",
                        "datos" => ["perfil" => $resultado["perf"]],
                        "errores" => null
                    ]);
                    break;
                case 2:
                    $_SESSION["tipo"] = "Administrador";
                    $_SESSION["ruta"] = "administrador";
                    echo json_encode([
                        "estado" => 200,
                        "mensaje" => "Inicio de sesión autorizado",
                        "datos" => ["perfil" => $resultado["perf"]],
                        "errores" => null
                    ]);
                    break;
                case 3:
                    $_SESSION["tipo"] = "Usuario";
                    $_SESSION["ruta"] = "usuario";
                    echo json_encode([
                        "estado" => 200,
                        "mensaje" => "Inicio de sesión autorizado",
                        "datos" => ["perfil" => $resultado["perf"]],
                        "errores" => null
                    ]);
                    break;
            }
        } else {
            session_destroy(); // Destruye la sesión.
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Contraseña incorrecta.",
                "datos" => null,
                "errores" => ["campo" => "contraseña"]
            ]);
        }
    } else {
        session_destroy(); // Destruye la sesión.
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Usuario inexistente o incorrecto.",
            "datos" => null,
            "errores" => ["campo" => "usuario"]
        ]);
    }
?>