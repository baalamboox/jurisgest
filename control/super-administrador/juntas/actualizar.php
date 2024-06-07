<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idJuntas = $_POST["idJuntas"];
    $juntas = $_POST["juntas"];

    $sql = "UPDATE tbl_junt SET nJunt=:juntas WHERE id=:idJuntas";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":juntas", $juntas);
    $consulta->bindParam(":idJuntas", $idJuntas);
    
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Juntas actualizado con éxito.",
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