<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $sql = "SELECT id,nJunt FROM tbl_junt";
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-users mr-2 text-gold-dark"></i>
            Listado de Juntas
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contenedorTabla">
                <thead>
                    <tr>
                        <th scope="col"><small>Junta(s)</small></th>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <th scope="col" class="text-center"><small>Editar</small></th>
                        <th scope="col" class="text-center"><small>Eliminar</small></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($consulta as $dato) {
                    ?>
                        <td><small><?=$dato["nJunt"]?></small></td>
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

<script src="manager/plantillas/secciones/tabla-juntas.js" defer="true"></script>