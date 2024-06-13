<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Definición de la zona horaria para ciudad de mèxico.
    date_default_timezone_set("America/Mexico_City");
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idUsuario = $_POST["idUsuario"];
    $correoElectronico = $_POST["correoElectronico"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $perfil = $_POST["perfil"];

    // Define una consulta SQL para actualizar un usuario
    $sql = "UPDATE tbl_usr SET nom=:nombres, ape=:apellidos, perf=:perfil, corr=:correoElectronico, fUlt=:fechaUltima WHERE id=:idUsuario";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":nombres", $nombres);
    $consulta->bindParam(":apellidos", $apellidos);
    $consulta->bindParam(":perfil", $perfil);
    $consulta->bindParam(":correoElectronico", $correoElectronico);
    $consulta->bindParam(":fechaUltima", date("Y-m-d"));
    $consulta->bindParam(":idUsuario", $idUsuario);

    // Ejecuta la consulta y verifica si fue exitosa
    if($consulta->execute()) {
        // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Usuario actualizado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar el usuario.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>