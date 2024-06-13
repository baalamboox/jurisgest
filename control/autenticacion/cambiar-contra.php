<?php 
    // Se usa el siguiente método para retormar la sesión actual.
    session_start();
     // Importación del archivo de configuración (conexión) a la base de datos.
    require_once "../../config/database/Conexion.php";

    // Instancia de la clase Conexion() y uso de la función obtener().
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos enviados por AJAX desde formulario   sesión.
    $contraActual = $_POST["contraActual"];
    $contraNueva = password_hash($_POST["contraNueva"], PASSWORD_DEFAULT);

    // Consulta para verificar si la contraseña  se actualizo.
    $sql = "SELECT aco FROM tbl_usr WHERE id= :id";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":id", $_SESSION["identificador"]);
    $consulta->execute();
    // Aquí se almacena el resultado de la consulta.
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    // Aquí empieza toda la logica para la validación de la contraseña de actualizo.
    if(password_verify($contraActual, $resultado["aco"])) {
        $sqlActualizar = "UPDATE tbl_usr SET aco= :contraNueva WHERE id= :id";
        $consultaActualizar = $obtenerConexion->prepare($sqlActualizar);
        $consultaActualizar->bindParam(":contraNueva", $contraNueva);
        $consultaActualizar->bindParam(":id", $_SESSION["identificador"]);
        if($consultaActualizar->execute()) {
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Contraseña actualizada.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al actualizar contraseña.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Las contraseñas no coinciden.",
            "datos" => null,
            "errores" => ["Campo contraña actual" => "No coinciden las contraseñas."]
        ]);
    }
?>