<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idUsuario = $_POST["idUsuario"];

    // Creación de consulta para eliminación de usuario
    $sql = "DELETE FROM tbl_usr WHERE id=:idUsuario";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":idUsuario", $idUsuario);

    try {
        if($consulta->execute()) {
            // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Usuario eliminado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
                // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al eliminar el usuario.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } catch (PDOException $Exception) {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el usuario porque esta relacionado con otros datos.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>