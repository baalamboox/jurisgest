<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idCliente = $_POST["idCliente"];

    // Creación de consulta para eliminación de cliente 
    $sql = "DELETE FROM tbl_cli WHERE id=:idCliente";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":idCliente", $idCliente);

    // Comparación del resultado de la consulta.
    try {
        if($consulta->execute()) {
            // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Cliente eliminado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
                // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al eliminar el cliente.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } catch (PDOException $Exception) {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el cliente porque esta relacionado con otros datos.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>