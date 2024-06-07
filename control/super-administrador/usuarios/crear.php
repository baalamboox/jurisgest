<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Definición de la zona horaria para ciudad de mèxico.
    date_default_timezone_set("America/Mexico_City");

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Obtención de los datos por método POST enviados desde AJAX.
    $correoElectronico = $_POST["correoElectronico"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $perfil = $_POST["perfil"];

    // Función para crear usuarios aleatorios.
    function crearUsuarioAleatorio($logitud = 10, $mayusculas = true, $minusculas = true, $numeros = true, $simbolos = false) {
        $usuario = '';
        $letrasMayusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz';
        $simbolosPermitidos = '!@#$%^&*.,:?(){}<>"';
        for($i = 0; $i < $logitud; $i++) { 
            if($mayusculas) {
                $usuario .=  $letrasMayusculas[random_int(0, strlen($letrasMayusculas)  - 1)];
            }
            if($minusculas) {
                $usuario .=  $letrasMinusculas[random_int(0, strlen($letrasMinusculas) - 1)];
            }
            if($numeros) {
                $usuario .= random_int(0, 9);
            }
            if($simbolos) {
                $usuario .= $simbolosPermitidos[random_int(0, strlen($simbolosPermitidos) - 1)];
            }
        }
        return str_shuffle(substr($usuario, 0, $logitud));
    }

    // Función para crear contraseñas aleatorias.
    function crearContraAleatoria($logitud = 10, $mayusculas = true, $minusculas = true, $numeros = true, $simbolos = true) {
        $contra = '';
        $letrasMayusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letrasMinusculas = 'abcdefghijklmnopqrstuvwxyz';
        $simbolosPermitidos = '!@#$%^&*.,:?(){}<>"';
        for($i = 0; $i < $logitud; $i++) { 
            if($mayusculas) {
                $contra .=  $letrasMayusculas[random_int(0, strlen($letrasMayusculas)  - 1)];
            }
            if($minusculas) {
                $contra .=  $letrasMinusculas[random_int(0, strlen($letrasMinusculas) - 1)];
            }
            if($numeros) {
                $contra .= random_int(0, 9);
            }
            if($simbolos) {
                $contra .= $simbolosPermitidos[random_int(0, strlen($simbolosPermitidos) - 1)];
            }
        }
        return str_shuffle(substr($contra, 0, $logitud));
    }

    $usuario = crearUsuarioAleatorio();
    $contra = crearContraAleatoria();

    // Consulta para crear el usuario.
    $sql = "INSERT INTO tbl_usr(usr, aco, nom, ape, perf, corr, fReg, fUlt) VALUES (:usuario, :contra, :nombres, :apellidos, :perfil, :correoElectronico, :fechaRegistro, :fechaUltima)";
    $consulta = $obtenerConexion->prepare($sql);
    $consulta->bindParam(":usuario", $usuario);
    $consulta->bindParam(":contra", password_hash($contra, PASSWORD_DEFAULT));
    $consulta->bindParam(":nombres", $nombres);
    $consulta->bindParam(":apellidos", $apellidos);
    $consulta->bindParam(":perfil", $perfil);
    $consulta->bindParam(":correoElectronico", $correoElectronico);
    $consulta->bindParam(":fechaRegistro", date("Y-m-d"));
    $consulta->bindParam(":fechaUltima", date("Y-m-d"));
    
    // Verifica si la consulta fue ejecutada con éxito.
    if($consulta->execute()) {
        echo json_encode([
            "estado" => 200,
            "mensaje" => "Usuario creado con éxito.",
            "datos" => [
                "usuario" => $usuario,
                "contra" => $contra
            ],
            "errores" => null
        ]);
    } else {
        echo json_encode([
            "estado" => 400,
            "mensaje" => "Error al crear usuario.",
            "datos" => null,
            "errores" => null
        ]);
    }    
?>