<?php

    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();

    $obtenerConexion = $conexion->obtener();

    $sqlClientes = "SELECT id, nom, aPat, aMat FROM tbl_cli";
    $sqlJuntas = "SELECT id, nJunt FROM tbl_junt";
    $consultaClientes = $obtenerConexion->query($sqlClientes);
    $consultaJuntas = $obtenerConexion->query($sqlJuntas);

?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-folder-plus mr-2 text-gold-light"></i>
            Creación de expediente
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearExpediente"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevoExpediente"><i class="fas fa-folder-plus mr-2"></i>Nuevo</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionExpediente" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado un nuevo expediente.</p>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombreExpediente">
                            <small><i class="fas fa-file-alt mr-2 text-gold-light"></i>Expediente</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombreExpediente" placeholder="Ingresa nombre expediente" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombreEmpresa">
                            <small><i class="fas fa-building mr-2 text-gold-light"></i>Empresa demandada</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombreEmpresa" placeholder="Ingresa nombre empresa demandada" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="listaClientes">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Cliente</small>
                        </label>
                        <select class="form-control form-control-sm" id="listaClientes" data-placeholder="Selecciona cliente">
                            <option value="0">Selecciona cliente</option>
                        <?php foreach($consultaClientes as $datoCliente) { ?>
                            <option value="<?=$datoCliente["id"]?>"><?php echo $datoCliente["id"] . " - " . $datoCliente["nom"] . " " . $datoCliente["aPat"] . " " . $datoCliente["aMat"] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="listaJuntas">
                            <small><i class="fas fa-handshake mr-2 text-gold-light"></i>Junta</small>
                        </label>
                        <select class="form-control form-control-sm" id="listaJuntas" data-placeholder="Selecciona junta">
                            <option value="0">Selecciona junta</option>
                        <?php foreach($consultaJuntas as $datoJunta) { ?>
                            <option value="<?=$datoJunta["id"]?>"><?php echo $datoJunta["id"] . " - " . $datoJunta["nJunt"]?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nota">
                            <small><i class="fas fa-sticky-note mr-2 text-gold-light"></i>Nota</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nota" placeholder="Ingresa alguna nota" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">
                            <small><i class="fas fa-lightbulb mr-2 text-gold-light"></i>Estado</small>
                        </label>
                        <select class="form-control form-control-sm" id="estado">
                            <option value="0">Selecciona el estado</option>
                            <option value="Abierto">Abierto</option>
                            <option value="Cerrado">Cerrado</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del script encargado de crear nuevos expedientes. -->
<script src="manager/super-administrador/expedientes/crear.js" defer="true"></script>