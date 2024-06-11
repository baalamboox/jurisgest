<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idUsuario = $_POST["idUsuario"];

    $sql = "DELETE FROM tbl_usr WHERE id=:idUsuario";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idUsuario", $idUsuario);

    try {
        if($consulta->execute()) {
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Usuario eliminado con éxito.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al eliminar el usuario.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } catch (PDOException $Exception) {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar el usuario porque esta relacionado con otros datos.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>