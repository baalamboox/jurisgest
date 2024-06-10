<?php
    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $expedienteID = $_POST["expedienteID"];
    $usuarioID = $_POST["usuarioID"];

    $sql = "INSERT INTO tbl_exp_usr(usr_id, exp_id) VALUES (:usuarioID, :expedienteID)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":usuarioID", $usuarioID);
    $consulta->bindParam(":expedienteID", $expedienteID);

    $sqlVerificar = "SELECT exp_id from tbl_exp_usr WHERE user_id=:usuarioID";
    $consultaVerificar = $obtenerConexion->prepare($sqlVerificar);
    $consultaVerificar->bindParam(":usuarioID", $usuarioID);

    // if($consulta->execute()) {
    //     echo json_encode([
    //         "estado" => 200,
    //         "mensaje" => "Expediente-Usuario asignado con éxito.",
    //         "datos" => null,
    //         "errores" => null
    //     ]);
    // } else {
    //     echo json_encode([
    //         "estado" => 400,
    //         "mensaje" => "Error al asignar el Expediente-Usuario.",
    //         "datos" => null,
    //         "errores" => null
    //     ]);
    // }
    echo json_encode($consultaVerificar->execute());   
?>