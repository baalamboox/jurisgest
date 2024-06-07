<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idJunta = $_POST["idJunta"];
    $nombreJunta = $_POST["nombreJunta"];

    $sql = "UPDATE tbl_junt SET nJunt=:nombreJunta WHERE id=:idJunta";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":nombreJunta", $nombreJunta);
    $consulta->bindParam(":idJunta", $idJunta);
    
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Junta actualizada con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar la Junta.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>