<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";


    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $juntas = $_POST["juntas"];

    // Consulta para crear el cliente.
    $sql = "INSERT INTO tbl_junt(nJunt) VALUES (:juntas)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":juntas", $juntas);
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta creado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear junta.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>