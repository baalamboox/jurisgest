<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idExpediente = $_POST["idExpediente"];

    // Creación de consulta para eliminación de Expedientes 
    $sql = "DELETE FROM tbl_exp WHERE id=:idExpediente";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idExpediente", $idExpediente);

    // Comparación del resultado de la consulta.
    try {
        if($consulta->execute()) {
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Expediente eliminado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al eliminar el expediente.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } catch (PDOException $Exception) {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el expediente porque esta relacionado con otros datos.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>