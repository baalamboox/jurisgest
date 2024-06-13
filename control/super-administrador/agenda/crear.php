<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $nombreAudiencia = $_POST["nombreAudiencia"];
    $expedienteID = $_POST["expedienteID"];
    $fechaAudiencia = $_POST["fechaAudiencia"];
    $comentario = $_POST["comentario"];

    // Consulta para crear la audiencia.
    $sql = "INSERT INTO tbl_aud(fAud, exp_id, nAud, com) VALUES (:fechaAudiencia, :expedienteID, :nombreAudiencia, :comentario)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":fechaAudiencia", $fechaAudiencia);
    $consulta->bindParam(":expedienteID", $expedienteID);
    $consulta->bindParam(":nombreAudiencia", $nombreAudiencia);
    $consulta->bindParam(":comentario", $comentario);
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Audiencia creada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear la audiencia.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>