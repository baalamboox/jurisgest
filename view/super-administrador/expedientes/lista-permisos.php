<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";
    
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();
    // Consulta para mostrar datos del lista de permiso.
    $sql = "SELECT tbl_exp_usr.id, tbl_exp.exp, tbl_usr.usr, tbl_usr.nom, tbl_usr.ape FROM tbl_exp_usr INNER JOIN tbl_exp ON tbl_exp_usr.exp_id=tbl_exp.id INNER JOIN tbl_usr ON tbl_exp_usr.usr_id=tbl_usr.id";
    // Prepara la consulta SQL usando una conexión previamente obtenida       
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <!-- Cabecera de tarjeta con ícono de usuarios y texto "Listado de permisos", alineación horizontal y justificación entre los extremos -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-tasks mr-2 text-gold-dark"></i>
            Listado de permisos
        </div>
    </div>
    <div class="card-body">
        <!-- Contenedor que hace la tabla dentro de él adaptable a diferentes tamaños de pantalla -->
        <div class="table-responsive">
            <!-- Tabla con clases para estilo de rayas y un identificador único "contenedorTabla" -->
            <table class="table table-striped" id="contenedorTabla">
            <!-- Cabecera de una tabla con columnas que incluyen información de los campos permisos-->
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Usuario</small></th>
                        <th scope="col"><small>Nombre(s)</small></th>
                        <th scope="col"><small>Apellido(s)</small></th>
                        <th scope="col"><small>Eliminar permiso</small></th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla que itera sobre los datos de consulta, mostrando información de la lista de permiso -->
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["exp"]?></small></td>
                        <td><small><?=$dato["usr"]?></small></td>
                        <td><small><?=$dato["nom"]?></small></td>
                        <td><small><?=$dato["ape"]?></small></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="manager/plantillas/secciones/tabla-permisos.js" defer="true"></script>