<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID de la audiencia a eliminar enviando por AJAX.
    $audienciaID = $_POST["idAudiencia"];

    // Creación de consulta para eliminación de la audiencia.
    $sql = "DELETE FROM tbl_aud WHERE id=:audienciaID";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":audienciaID", $audienciaID);

    // Comparación del resultado de la consulta.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Audiencia eliminada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar la Audiencia.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>