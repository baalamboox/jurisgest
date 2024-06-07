<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Definición de la zona horaria para ciudad de mèxico.
    date_default_timezone_set("America/Mexico_City");
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $idUsuario = $_POST["idUsuario"];
    $correoElectronico = $_POST["correoElectronico"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $perfil = $_POST["perfil"];
 // Obtención de los datos por método POST enviados desde AJAX.
    $sql = "UPDATE tbl_usr SET nom=:nombres, ape=:apellidos, perf=:perfil, corr=:correoElectronico, fUlt=:fechaUltima WHERE id=:idUsuario";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":nombres", $nombres);
    $consulta->bindParam(":apellidos", $apellidos);
    $consulta->bindParam(":perfil", $perfil);
    $consulta->bindParam(":correoElectronico", $correoElectronico);
    $consulta->bindParam(":fechaUltima", date("Y-m-d"));
    $consulta->bindParam(":idUsuario", $idUsuario);

    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Usuario actualizado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar el usuario.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>