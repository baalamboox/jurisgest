<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";


    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $nombreJunta = $_POST["nombreJunta"];

    // Consulta para crear el cliente.
    $sql = "INSERT INTO tbl_junt(nJunt) VALUES (:nombreJunta)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":nombreJunta", $nombreJunta);
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta creada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear la junta.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>