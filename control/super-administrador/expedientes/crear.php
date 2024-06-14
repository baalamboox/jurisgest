<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Definición de la zona horaria para ciudad de méxico.
    date_default_timezone_set("America/Mexico_City");

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $nombreExpediente = $_POST["nombreExpediente"];
    $nombreEmpresa = $_POST["nombreEmpresa"];
    $clienteID = $_POST["cliente_id"];
    $juntaID = $_POST["junta_id"];
    $nota = $_POST["nota"];
    $estado = $_POST["estado"];

    // Consulta para crear el expediente.
    $sql = "INSERT INTO tbl_exp(exp, emp, sta, nota, junt_id, cli_id, fReg) VALUES (:nombreExpediente, :nombreEmpresa, :estado, :nota, :juntaID, :clienteID, :fechaRegistro)";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":nombreExpediente", $nombreExpediente);
    $consulta->bindParam(":nombreEmpresa", $nombreEmpresa);
    $consulta->bindParam(":estado", $estado);
    $consulta->bindParam(":nota", $nota);
    $consulta->bindParam(":juntaID", $juntaID);
    $consulta->bindParam(":clienteID", $clienteID);
    $consulta->bindParam(":fechaRegistro", date("Y-m-d"));

    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Expediente creado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear el expediente.",
            "datos" => null,
            "errores" => null
        ]);
    }   
?>