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

    $sql = "UPDATE tbl_exp SET nota=:nota, sta=:estado WHERE id=:idExpediente";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":nota", $nota);
    $consulta->bindParam(":estado", $estado);
    $consulta->bindParam(":idExpediente", $idExpediente);
    
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Expediente actualizado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar el Expediente.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>