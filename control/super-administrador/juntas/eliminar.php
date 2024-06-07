<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obteneción del ID del usuario a eliminar enviando por AJAX.
    $idJuntas = $_POST["idJuntas"];

    // Creación de consulta para eliminación de clientes.
    $sql = "DELETE FROM tbl_junt WHERE id=:idJuntas";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":idJuntas", $idJuntas);

    // Comparación del resultado de la consulta.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Juntas eliminado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al eliminar la Junttas.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>