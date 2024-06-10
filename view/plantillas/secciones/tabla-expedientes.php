<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $sql = "SELECT tbl_exp.id, tbl_exp.exp, tbl_exp.emp, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat) as cli, tbl_junt.nJunt as junt, tbl_exp.nota, tbl_exp.sta  FROM tbl_exp INNER JOIN tbl_cli ON tbl_exp.cli_id = tbl_cli.id INNER JOIN tbl_junt ON tbl_exp.junt_id = tbl_junt.id;";
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
                        <th scope="col"><small>Empresa demandada</small></th>
                        <th scope="col"><small>Cliente</small></th>
                        <th scope="col"><small>Junta</small></th>
                        <th scope="col"><small>Nota</small></th>
                        <th scope="col"><small>Estado</small></th>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <th scope="col"><small>Editar</small></th>
                        <th scope="col"><small>Eliminar</small></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["exp"]?></small></td>
                        <td><small><?=$dato["emp"]?></small></td>
                        <td><small><?=$dato["cli"]?></small></td>
                        <td><small><?=$dato["junt"]?></small></td>
                        <td><small><?=$dato["nota"]?></small></td>
                        <td><small><?=$dato["sta"]?></small></td>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-editar" id="<?=$dato["id"]?>"><i class="fas fa-pen"></i></span></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="manager/plantillas/secciones/tabla-expedientes.js" defer="true"></script>