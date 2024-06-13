<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $idCliente = $_POST["idCliente"];
    $nombres = $_POST["nombres"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $calle = $_POST["calle"];
    $numeroExterior = $_POST["numeroExterior"];
    $numeroInterior = $_POST["numeroInterior"];
    $colonia = $_POST["colonia"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $codigoPostal = $_POST["codigoPostal"];
    $telefono1 = $_POST["telefono1"];
    $telefono2 = $_POST["telefono2"];
    $celular = $_POST["celular"];
    $correoElectronico = $_POST["correoElectronico"];

    // Define una consulta SQL para actualizar un Cliente
    $sql = "UPDATE tbl_cli SET nom=:nombres, aPat=:apellidoPaterno, aMat=:apellidoMaterno, calle=:calle, nInt=:numeroInterior, `nExt`=:numeroExterior, col=:colonia, cp=:codigoPostal, ciud=:ciudad, edo=:estado, tel1=:telefono1, tel2=:telefono2, cel=:celular, corr=:correoElectronico WHERE id=:idCliente";
    // Prepara la consulta SQL usando una conexión previamente obtenida
    $consulta = $obtenerConexion->prepare($sql);
    // Vincula los parámetros con las variables
    $consulta->bindParam(":nombres", $nombres);
    $consulta->bindParam(":apellidoPaterno", $apellidoPaterno);
    $consulta->bindParam(":apellidoMaterno", $apellidoMaterno);
    $consulta->bindParam(":calle", $calle);
    $consulta->bindParam(":numeroInterior", $numeroInterior);
    $consulta->bindParam(":numeroExterior", $numeroExterior);
    $consulta->bindParam(":colonia", $colonia);
    $consulta->bindParam(":codigoPostal", $codigoPostal);
    $consulta->bindParam(":ciudad", $ciudad);
    $consulta->bindParam(":estado", $estado);
    $consulta->bindParam(":telefono1", $telefono1);
    $consulta->bindParam(":telefono2", $telefono2);
    $consulta->bindParam(":celular", $celular);
    $consulta->bindParam(":correoElectronico", $correoElectronico);
    $consulta->bindParam(":idCliente", $idCliente);

    // Ejecuta la consulta y verifica si fue exitosa
    if($consulta->execute()) {
        // Si la consulta fue exitosa, envía una respuesta JSON con estado 200 y un mensaje de éxito
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Cliente actualizado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        // Si hubo un error al ejecutar la consulta, envía una respuesta JSON con estado 400 y un mensaje de error
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al actualizar el cliente.",
            "datos" => null,
            "errores" => null
        ]);
    }
?>