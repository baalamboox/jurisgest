<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $expedienteID = $_POST["expedienteID"];
    $usuarioID = $_POST["usuarioID"];

    // Consulta para crear premiso
    $sql = "INSERT INTO tbl_exp_usr(usr_id, exp_id) VALUES (:usuarioID, :expedienteID)";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":usuarioID", $usuarioID);
    $consulta->bindParam(":expedienteID", $expedienteID);

    $sqlVerificar = "SELECT exp_id from tbl_exp_usr WHERE usr_id=:usuarioID AND exp_id=:expedienteID";
    // Prepara la consulta SQL usando una conexión previamente obtenida 
    $consultaVerificar = $obtenerConexion->prepare($sqlVerificar);
    // Vincula los parámetros con las variables 
    $consultaVerificar->bindParam(":usuarioID", $usuarioID);
    $consultaVerificar->bindParam(":expedienteID", $expedienteID);
    $consultaVerificar->execute();

    $resultadoVerificar = $consultaVerificar->fetch(PDO::FETCH_ASSOC);
        // Verifica si la consulta fue ejecutada con éxito.
    if($resultadoVerificar) {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Expediente-Usuario ya esta asignado.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        if($consulta->execute()) {
            // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Expediente-Usuario asignado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al asignar el Expediente-Usuario.",
                "datos" => null,
                "errores" => null
            ]);
        } 
    }
?>