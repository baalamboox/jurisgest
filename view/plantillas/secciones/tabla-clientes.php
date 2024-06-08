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
                        <th scope="col"><small>Nombre(s)</small></th>
                        <th scope="col"><small>Apellido paterno</small></th>
                        <th scope="col"><small>Apellido materno</small></th>
                        <th scope="col"><small>Calle</small></th>
                        <th scope="col"><small>Número Interior</small></th>
                        <th scope="col"><small>Número Exterior</small></th>
                        <th scope="col"><small>Colonia</small></th>
                        <th scope="col"><small>Código Postal</small></th>
                        <th scope="col"><small>Ciudad</small></th>
                        <th scope="col"><small>Estado</small></th>
                        <th scope="col"><small>Teléfono 1</small></th>
                        <th scope="col"><small>Teléfono 2</small></th>
                        <th scope="col"><small>Celular</small></th>
                        <th scope="col"><small>Correo electrónico</small></th>
                        <th scope="col"><small>Fecha registro</small></th>
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
                        <td><small><?=$dato["nom"]?></small></td>
                        <td><small><?=$dato["aPat"]?></small></td>
                        <td><small><?=$dato["aMat"]?></small></td>
                        <td><small><?=$dato["calle"]?></small></td>
                        <td><small><?=$dato["nInt"]?></small></td>
                        <td><small><?=$dato["nExt"]?></small></td>
                        <td><small><?=$dato["col"]?></small></td>
                        <td><small><?=$dato["cp"]?></small></td>
                        <td><small><?=$dato["ciud"]?></small></td>
                        <td><small><?=$dato["edo"]?></small></td>
                        <td><small><?=$dato["tel1"]?></small></td>
                        <td><small><?=$dato["tel2"]?></small></td>
                        <td><small><?=$dato["cel"]?></small></td>
                        <td><small><?=$dato["corr"]?></small></td>
                        <td><small><?= date_format(date_create($dato["fReg"]), "d-m-Y"); ?></small></td>
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

<script src="manager/plantillas/secciones/tabla-clientes.js" defer="true"></script>