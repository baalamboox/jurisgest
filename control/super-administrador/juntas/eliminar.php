<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idJunta = $_POST["idJunta"];

    // Creación de consulta para eliminación de clientes.
    $sql = "DELETE FROM tbl_junt WHERE id=:idJunta";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idJunta", $idJunta);

    // Comparación del resultado de la consulta.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta eliminada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar la Junta.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>