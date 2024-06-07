<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Definición de la zona horaria para ciudad de méxico.
    date_default_timezone_set("America/Mexico_City");

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
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

    // Consulta para crear el cliente.
    $sql = "INSERT INTO tbl_cli(nom, aPat, aMat, calle, nInt, `nExt`, col, cp, ciud, edo, tel1, tel2,cel,corr, fReg) VALUES (:nombres, :apellidoPaterno, :apellidoMaterno, :calle, :numeroInterior, :numeroExterior, :colonia, :codigoPostal, :ciudad, :estado, :telefono1, :telefono2, :celular, :correoElectronico, :fechaRegistro)";
    $consulta = $obtenerConexion->prepare($sql);
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
    $consulta->bindParam(":fechaRegistro", date("Y-m-d"));
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Cliente creado con éxito.",
            "datos" => null,
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear cliente.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>