<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    // Conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Consulta para obtener las audiencias.
    $sql = "SELECT tbl_aud.id, tbl_aud.fAud, tbl_junt.nJunt, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat, \" \", tbl_cli.aMat) as cli, tbl_exp.exp, tbl_aud.nAud, tbl_aud.com FROM tbl_aud INNER JOIN tbl_exp ON tbl_aud.exp_id=tbl_exp.id INNER JOIN tbl_junt ON tbl_exp.junt_id=tbl_junt.id INNER JOIN tbl_cli ON tbl_exp.cli_id=tbl_cli.id";
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-clipboard-list mr-2 text-gold-dark"></i>
            Listado de audiencias
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contenedorTabla">
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Fecha audiencia</small></th>
                        <th scope="col"><small>Junta</small></th>
                        <th scope="col"><small>Cliente</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Nombre audiencia</small></th>
                        <th scope="col"><small>Comentario</small></th>
                        <th scope="col"><small>Eliminar</small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["fAud"]?></small></td>
                        <td><small><?=$dato["nJunt"]?></small></td>
                        <td><small><?=$dato["cli"]?></small></td>
                        <td><small><?=$dato["exp"]?></small></td>
                        <td><small><?=$dato["nAud"]?></small></td>
                        <td><small><?=$dato["com"]?></small></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Implemetación de la funcionalidad  para la tabla de audiencias. -->
<script src="manager/super-administrador/agenda/tabla-audiencias.js" defer="true"></script>