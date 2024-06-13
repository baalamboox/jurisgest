<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idJunta = $_POST["idJunta"];
    $nombreJunta = $_POST["nombreJunta"];

    // Define una consulta SQL para actualizar un usuario
    $sql = "UPDATE tbl_junt SET nJunt=:nombreJunta WHERE id=:idJunta";

    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);

    // Vincula los parámetros con las variables
    $consulta->bindParam(":nombreJunta", $nombreJunta);
    $consulta->bindParam(":idJunta", $idJunta);
    
     // Ejecuta la consulta y verifica si fue exitosa
    if($consulta->execute()) {
    // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta actualizada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar la Junta.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>