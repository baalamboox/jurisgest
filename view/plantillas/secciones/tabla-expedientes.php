<?php

    // Importación de la conexión a la base de datos.
    require_once "../../../config/database/Conexion.php";

    session_start();
    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2) {
        // Consulta para mostrar  datos del Expediente.
        $sql = "SELECT tbl_exp.id, tbl_exp.exp, tbl_exp.emp, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat) as cli, tbl_junt.nJunt as junt, tbl_exp.nota, tbl_exp.sta, tbl_exp.fReg  FROM tbl_exp INNER JOIN tbl_cli ON tbl_exp.cli_id = tbl_cli.id INNER JOIN tbl_junt ON tbl_exp.junt_id = tbl_junt.id;";
        // Prepara la consulta SQL usando una conexión previamente obtenida    
        $consulta = $obtenerConexion->query($sql);

?>
<div class="card shadow p-4 border-0">
    <!-- Cabecera de una tarjeta con un ícono de usuarios y el texto "Listado de expedientes", 
    con contenido alineado horizontalmente y justificado entre los extremos -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-file-alt mr-2 text-gold-dark"></i>
            Listado de expedientes
        </div>
    </div>
    <div class="card-body">
        <!-- Contenedor que hace la tabla dentro de él adaptable a diferentes tamaños de pantalla -->
        <div class="table-responsive">
        <!-- Tabla con clases para estilo de rayas y un identificador único "contenedorTabla" -->
            <table class="table table-striped" id="contenedorTabla">
                <!-- Cabecera de una tabla con columnas que incluyen información de los campos expediente-->
                <div class="row mt-0 mb-3">
                    <div class="col">
                        <small>Filtrar expedientes por rango de fechas</small>
                    </div>
                </div>
                <div class="row mt-0 mb-2">
                    <div class="col-md-4">
                        <small>
                            <div class="form-group">
                                <label for="fechaInicial" class="text-muted">Fecha inicial</label>
                                <input type="date" class="form-control form-control-sm text-muted" id="fechaInicial" />
                            </div>
                        </small>
                    </div>
                    <div class="col-md-4">
                        <small>
                            <div class="form-group">
                                <label for="fechaFinal" class="text-muted">Fecha final</label>
                                <input type="date" class="form-control form-control-sm text-muted" id="fechaFinal" />
                            </div>
                        </small>
                    </div>
                </div>
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Empresa demandada</small></th>
                        <th scope="col"><small>Cliente</small></th>
                        <th scope="col"><small>Junta</small></th>
                        <th scope="col"><small>Nota</small></th>
                        <th scope="col"><small>Estado</small></th>
                        <th scope="col"><small>Fecha registro</small></th>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <th scope="col"><small>Editar</small></th>
                        <th scope="col"><small>Eliminar</small></th>
                        <?php } ?>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla que itera sobre los datos de consulta, mostrando información del expedientes -->
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
                        <td><small><?=$dato["fReg"]?></small></td>
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
<!-- Inclusión de un archivo JavaScript ubicado en la ruta "manager/plantillas/secciones/tabla-clientes.js" con atributo defer para cargarlo de forma asíncrona después del análisis del documento -->

<script src="manager/plantillas/secciones/tabla-expedientes.js" defer="true"></script>
<?php } else {
    $usuarioID = $_SESSION["identificador"];
    // Consulta para mostrar  datos del Expediente.
    $sql = "SELECT tbl_exp_usr.id, tbl_exp.exp, tbl_exp.emp, CONCAT(tbl_cli.nom, \" \", tbl_cli.aPat) as cli, tbl_junt.nJunt, tbl_exp.nota, tbl_exp.sta, tbl_exp.fReg FROM tbl_exp_usr INNER JOIN tbl_exp ON tbl_exp_usr.exp_id=tbl_exp.id INNER JOIN tbl_junt ON tbl_exp.junt_id=tbl_junt.id INNER JOIN tbl_cli ON tbl_exp.cli_id=tbl_cli.id WHERE tbl_exp_usr.usr_id=$usuarioID";
     // Prepara la consulta SQL usando una conexión previamente obtenida    
    $consulta = $obtenerConexion->query($sql);
?>
<div class="card shadow p-4 border-0">
    <!-- Cabecera de una tarjeta con un ícono de usuarios y el texto "Listado de expedientes", 
    con contenido alineado horizontalmente y justificado entre los extremos -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-file-alt mr-2 text-gold-dark"></i>
            Listado de Expedientes
        </div>
    </div>
    <div class="card-body">
            <!-- Contenedor que hace la tabla dentro de él adaptable a diferentes tamaños de pantalla -->
        <div class="table-responsive">
            <!-- Tabla con clases para estilo de rayas y un identificador único "contenedorTabla" -->
            <div class="row mt-0 mb-3">
                <div class="col">
                    <small>Filtrar expedientes por rango de fechas</small>
                </div>
            </div>
            <div class="row mt-0 mb-2">
                <div class="col-md-4">
                    <small>
                        <div class="form-group">
                            <label for="fechaInicial" class="text-muted">Fecha inicial</label>
                            <input type="date" class="form-control form-control-sm text-muted" id="fechaInicial" />
                        </div>
                    </small>
                </div>
                <div class="col-md-4">
                    <small>
                        <div class="form-group">
                            <label for="fechaFinal" class="text-muted">Fecha final</label>
                            <input type="date" class="form-control form-control-sm text-muted" id="fechaFinal" />
                        </div>
                    </small>
                </div>
            </div>
            <table class="table table-striped" id="contenedorTabla">
                <!-- Cabecera de una tabla con columnas que incluyen información de los campos expediente-->
                <thead>
                    <tr>
                        <th scope="col"><small>ID</small></th>
                        <th scope="col"><small>Expediente</small></th>
                        <th scope="col"><small>Empresa demandada</small></th>
                        <th scope="col"><small>Cliente</small></th>
                        <th scope="col"><small>Junta</small></th>
                        <th scope="col"><small>Nota</small></th>
                        <th scope="col"><small>Estado</small></th>
                        <td scope="col"><small>Fecha registro</small></td>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla que itera sobre los datos de consulta, mostrando información del expedientes -->
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
                        <td><small><?=$dato["fReg"]?></small></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Script que inicializa un DataTable en el elemento con ID "contenedorTabla",
    configurando opciones de idioma en español,diseño de botones para imprimir
    específicamente algunas columnas, y personalización del título para la impresión -->
<script>
    $(document).ready(() => {
        const campoFechaInicial = $("#fechaInicial");
        const campoFechaFinal = $("#fechaFinal");

        const dataTable = new DataTable("#contenedorTabla", {
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
                                columns: [1, 2, 3, 4, 5, 6],
                                
                            },
                            className: "btn-gold-light mb-1 btn-sm border-0",
                            text: '<i class="fas fa-print mr-2"></i>Imprimir',
                            title: "Lista de Expedientes"
                            
                        },
                    ]
                }
            },
        });

         // Filtrado personalizado para rango de fechas de los expedientes.
        dataTable.columns(7).search.fixed('range', (data) => {
            if (
                (campoFechaInicial.val() == "" && campoFechaFinal.val() == "") ||
                (campoFechaInicial.val() == "" && data <= campoFechaFinal.val()) ||
                (campoFechaInicial.val() <= data && campoFechaFinal.val() == "") ||
                (campoFechaInicial.val() <= data && data <= campoFechaFinal.val())
            ) {
                return true;
            }
            return false;
        });

        // Asiganación de lo eventos de cambio para lo selectores de fechas.
        campoFechaInicial.change(() => dataTable.draw());
        campoFechaFinal.change(() => dataTable.draw());
    });
</script>
<?php } ?>