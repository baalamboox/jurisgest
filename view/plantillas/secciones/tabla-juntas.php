<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();
    // Consulta para mostrar  datos del Expediente.
    $sql = "SELECT id, nJunt FROM tbl_junt";
     // Prepara la consulta SQL usando una conexión previamente obtenida    
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <!-- Cabecera de una tarjeta con un ícono de usuarios y el texto "Listado de juntas", 
    con contenido alineado horizontalmente y justificado entre los extremos -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-hadshake mr-2 text-gold-dark"></i>
            Listado de juntas
        </div>
    </div>
    <div class="card-body">
            <!-- Contenedor que hace la tabla dentro de él adaptable a diferentes tamaños de pantalla -->
        <div class="table-responsive">
            <!-- Tabla con clases para estilo de rayas y un identificador único "contenedorTabla" -->
            <table class="table table-striped" id="contenedorTabla">
            <!-- Cabecera de una tabla con columnas que incluyen información de los campos  junta-->                
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Nombre</small></th>
                        <th scope="col" class="text-center"><small>Editar</small></th>
                        <th scope="col" class="text-center"><small>Eliminar</small></th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla que itera sobre los datos de consulta, mostrando información del junta-->
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["nJunt"]?></small></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-editar" id="<?=$dato["id"]?>"><i class="fas fa-pen"></i></span></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Inclusión de un archivo JavaScript ubicado en la ruta "manager/plantillas/secciones/tabla-clientes.js" con atributo defer para cargarlo de forma asíncrona después del análisis del documento -->
<script src="manager/plantillas/secciones/tabla-juntas.js" defer="true"></script>