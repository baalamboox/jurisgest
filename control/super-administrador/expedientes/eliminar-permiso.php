<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idExpedienteUsuario = $_POST["idExpedienteUsuario"];

    // Creación de consulta para eliminación de permisos de Expedientes. 
    $sql = "DELETE FROM tbl_exp_usr WHERE id=:idExpedienteUsuario";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idExpedienteUsuario", $idExpedienteUsuario);

    // Comparación del resultado de la consulta.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Permiso expediente eliminado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el permiso del expediente.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>