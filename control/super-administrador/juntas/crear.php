<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";


    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $nombreJunta = $_POST["nombreJunta"];

    // Consulta para crear el Junta.
    $sql = "INSERT INTO tbl_junt(nJunt) VALUES (:nombreJunta)";

    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
   // Vincula los parámetros con las variables
    $consulta->bindParam(":nombreJunta", $nombreJunta);
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta creada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear la junta.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>