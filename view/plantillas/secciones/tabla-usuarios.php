<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    $sql = "SELECT id, usr, nom, ape, perf, corr, fReg, fUlt FROM tbl_usr";
    $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-friends mr-2 text-gold-light"></i>
            Listado de usuarios
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="contenedorTabla">
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Usuario</small></th>
                        <th scope="col"><small>Pefil</small></th>
                        <th scope="col"><small>Nombre(s)</small></th>
                        <th scope="col"><small>Apellido(s)</small></th>
                        <th scope="col"><small>Correo electrónico</small></th>
                        <th scope="col"><small>Fecha registro</small></th>
                        <th scope="col"><small>Fecha última</small></th>
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
                    <tr>
                        <td><small><?=$dato["id"]?></small></td>
                        <td><small><?=$dato["usr"]?></small></td>
                        <td>
                            <small>
                            <?php 
                                switch($dato["perf"]) {
                                    case 1:
                                        echo "Super Administrador";
                                        break;
                                    case 2:
                                        echo "Administrador";
                                        break;
                                    case 3:
                                        echo "Usuario";
                                        break;
                                }
                            ?>
                            </small>
                        </td>
                        <td><small><?=$dato["nom"]?></small></td>
                        <td><small><?=$dato["ape"]?></small></td>
                        <td><small><?=$dato["corr"]?></small></td>
                        <td><small><?= date_format(date_create($dato["fReg"]), "d-m-Y"); ?></small></td>
                        <td><small><?= date_format(date_create($dato["fUlt"]), "d-m-Y"); ?></small></td>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <?php if($dato["id"] == $_SESSION["identificador"]) { ?>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-editar" id="-<?=$dato["id"]?>"><i class="fas fa-pen"></i></span></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light"><i class="fas fa-user-alt-slash"></i></span></td>
                        <?php } else { ?>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-editar" id="<?=$dato["id"]?>"><i class="fas fa-pen"></i></span></td>
                        <td class="text-center"><span class="btn btn-sm btn-gold-light boton-eliminar" id="<?=$dato["id"]?>"><i class="fas fa-trash"></i></span></td>
                        <?php } ?>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="manager/plantillas/secciones/tabla-usuarios.js" defer="true"></script>