<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idCliente = $_POST["idCliente"];

    // Creación de consulta para eliminación de Juntas  
    $sql = "DELETE FROM tbl_cli WHERE id=:idCliente";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idCliente", $idCliente);

    // Comparación del resultado de la consulta.
    try {
        if($consulta->execute()) {
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Cliente eliminado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al eliminar el cliente.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } catch (PDOException $Exception) {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el cliente porque esta relacionado con otros datos.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>