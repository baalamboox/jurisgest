<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $nombreExpediente = $_POST["nombreExpediente"];
    $nombreEmpresa = $_POST["nombreEmpresa"];
    $clienteID = $_POST["cliente_id"];
    $juntaID = $_POST["junta_id"];
    $nota = $_POST["nota"];
    $estado = $_POST["estado"];

    $sql = "INSERT INTO tbl_exp(exp, emp, sta, nota, junt_id, cli_id) VALUES (:nombreExpediente, :nombreEmpresa, :estado, :nota, :juntaID, :clienteID)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":nombreExpediente", $nombreExpediente);
    $consulta->bindParam(":nombreEmpresa", $nombreEmpresa);
    $consulta->bindParam(":estado", $estado);
    $consulta->bindParam(":nota", $nota);
    $consulta->bindParam(":juntaID", $juntaID);
    $consulta->bindParam(":clienteID", $clienteID);

    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Expediente creado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear el expediente.",
            "datos" => null,
            "errores" => null
        ]);
    }   
?>