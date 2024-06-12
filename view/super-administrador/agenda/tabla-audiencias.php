<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $sql = "SELECT id, nom, aPat, aMat, calle, nInt, nExt, col, cp, ciud, edo, tel1, tel2, cel, corr, fReg FROM tbl_cli";
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-clipboard-list mr-2 text-gold-dark"></i>
            Listado de Audiencias
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contenedorTabla">
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Fecha audiencia</small></th>
                        <th scope="col"><small>Hora audiencia</small></th>
                        <th scope="col"><small>Junta</small></th>
                        <th scope="col"><small>Cliente</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Nombre audiencia</small></th>
                        <th scope="col"><small>Eliminar</small></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["id"]?></small></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="manager/super-administrador/agenda/tabla-audiencias.js" defer="true"></script>