<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $sql = "SELECT tbl_exp_usr.id, tbl_exp.exp, tbl_usr.usr FROM tbl_exp_usr INNER JOIN tbl_exp ON tbl_exp_usr.exp_id=tbl_exp.id INNER JOIN tbl_usr ON tbl_exp_usr.usr_id=tbl_usr.id";
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-users mr-2 text-gold-dark"></i>
            Listado de clientes
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contenedorTabla">
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Usuario</small></th>
                        <th scope="col"><small>Eliminar permiso</small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["exp"]?></small></td>
                        <td><small><?=$dato["usr"]?></small></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="manager/plantillas/secciones/tabla-permisos.js" defer="true"></script>