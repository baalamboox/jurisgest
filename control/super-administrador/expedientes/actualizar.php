<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idExpediente = $_POST["idExpediente"];
    $nota = $_POST["nota"];
    $estado = $_POST["estado"];

    // Define una consulta SQL para actualizar un expediente
    $sql = "UPDATE tbl_exp SET nota=:nota, sta=:estado WHERE id=:idExpediente";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":nota", $nota);
    $consulta->bindParam(":estado", $estado);
    $consulta->bindParam(":idExpediente", $idExpediente);
    
    // Ejecuta la consulta y verifica si fue exitosa
    if($consulta->execute()) {
    // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Expediente actualizado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
            // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar el Expediente.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>