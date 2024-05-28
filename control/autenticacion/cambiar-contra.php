<?php 
    session_start();

    require_once "../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();


    $contraActual = $_POST["contraActual"];
    $contraNueva = password_hash($_POST["contraNueva"], PASSWORD_DEFAULT);

    $sql = "SELECT aco FROM tbl_usr WHERE id= :id";

    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":id", $_SESSION["identificador"]);

    $consulta->execute();

    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    if(password_verify($contraActual, $resultado["aco"])) {
        $sqlActualizar = "UPDATE tbl_usr SET aco= :contraNueva WHERE id= :id";
        $consultaActualizar = $obtenerConexion->prepare($sqlActualizar);
        $consultaActualizar->bindParam(":contraNueva", $contraNueva);
        $consultaActualizar->bindParam(":id", $_SESSION["identificador"]);
        if($consultaActualizar->execute()) {
            echo json_encode([
                "estado" => 200,
                "mensaje" => "Contraseña actualizada.",
                "datos" => null,
                "errores" => null
            ]);
        } else {
            echo json_encode([
                "estado" => 400,
                "mensaje" => "Error al actualizar contraseña.",
                "datos" => null,
                "errores" => null
            ]);
        }
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Las contraseñas no coinciden.",
            "datos" => null,
            "errores" => ["Campo contraña actual" => "No coinciden las contraseñas."]
        ]);
    }
?>