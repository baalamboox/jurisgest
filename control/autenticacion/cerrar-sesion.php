<?php
    // Se usa el siguiente método para retormar la sesión actual.
    session_start();

    // Se usa el siguiente método para destruir la sesión actual.
    session_destroy();

    // Se manda en JSON con el contenido que se ha cerrado correctamente la sesión.
    echo json_encode([
        "estado" => 200,
        "mensaje" => "Sesión cerrada correctamente.",
        "datos" => null,
        "errores" => null
    ]);
?>