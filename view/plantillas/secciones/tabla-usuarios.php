<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();
    // Consulta para mostrar  datos del Expediente.
    $sql = "SELECT id, usr, nom, ape, perf, corr, fReg, fUlt FROM tbl_usr";
        // Prepara la consulta SQL usando una conexión previamente obtenida    
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
            <!-- Contenedor que hace la tabla dentro de él adaptable a diferentes tamaños de pantalla -->
        <div class="table-responsive">
            <!-- Tabla con clases para estilo de rayas y un identificador único "contenedorTabla" -->
            <table class="table table-striped" id="contenedorTabla">
            <!-- Cabecera de una tabla con columnas que incluyen información de los campos usuarios-->
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
                <!-- Cuerpo de la tabla que itera sobre los datos de consulta, mostrando información del usuarios -->
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

<!-- Inclusión de un archivo JavaScript ubicado en la ruta "manager/plantillas/secciones/tabla-clientes.js" con atributo defer para cargarlo de forma asíncrona después del análisis del documento -->
<script src="manager/plantillas/secciones/tabla-usuarios.js" defer="true"></script>