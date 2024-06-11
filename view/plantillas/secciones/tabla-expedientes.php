<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();

    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2) {
        $sql = "SELECT tbl_exp.id, tbl_exp.exp, tbl_exp.emp, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat) as cli, tbl_junt.nJunt as junt, tbl_exp.nota, tbl_exp.sta  FROM tbl_exp INNER JOIN tbl_cli ON tbl_exp.cli_id = tbl_cli.id INNER JOIN tbl_junt ON tbl_exp.junt_id = tbl_junt.id;";
        $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-file-alt mr-2 text-gold-dark"></i>
            Listado de Expedientes
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
<?php } else {
    $usuarioID = $_SESSION["identificador"];
    $sql = "SELECT tbl_exp_usr.id, tbl_exp.exp, tbl_exp.emp, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat) as cli, tbl_junt.nJunt, tbl_exp.nota, tbl_exp.sta FROM tbl_exp_usr INNER JOIN tbl_exp ON tbl_exp_usr.exp_id=tbl_exp.id INNER JOIN tbl_junt ON tbl_exp.junt_id=tbl_junt.id INNER JOIN tbl_cli ON tbl_exp.cli_id=tbl_cli.id WHERE tbl_exp_usr.usr_id=$usuarioID";
    $consulta = $obtenerConexion->query($sql);
?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-file-alt mr-2 text-gold-dark"></i>
            Listado de Expedientes
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
                        <td><small><?=$dato["nJunt"]?></small></td>
                        <td><small><?=$dato["nota"]?></small></td>
                        <td><small><?=$dato["sta"]?></small></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    dataTable = new DataTable("#contenedorTabla", {
        responsive: false,
        language: {
            url: `${window.location.origin}/public/lang/es-mx.json`
        },
        layout: {
            topStart: {
                buttons: [
                    {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6],
                            
                        },
                        className: "btn-gold-light mb-1 btn-sm border-0",
                        text: '<i class="fas fa-print mr-2"></i>Imprimir',
                        title: "Lista de Expedientes"
                        
                    },
                ]
            }
        },
    });
</script>
<?php } ?>