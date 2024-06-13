<?php

    require_once "../../../config/database/Conexion.php";

    // Obtener conexión a la base de datos.
    $conexion = new Conexion();
    $obtenerConexion = $conexion->obtener();

    // Consulta para obtener los expedientes.
    $sqlExpedientes = "SELECT id, exp FROM tbl_exp";
    $consultaExpedientes = $obtenerConexion->query($sqlExpedientes);
?>
<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-plus mr-2 text-gold-light"></i>
            Creación de audiencia
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearAudiencia"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevaAudiencia"><i class="fas fa-clipboard-list mr-2"></i>Nueva</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionAudiencia" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado una nueva audiencia.</p>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="nombreAudiencia">
                            <small><i class="fas fa-signature mr-2 text-gold-light"></i>Nombre audiencia</small>
                        </label>
                        <input type="" class="form-control form-control-sm" id="nombreAudiencia" placeholder="Ingresa nombre audiencia" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="listaExpedientes">
                            <small><i class="fas fa-file-alt mr-2 text-gold-light"></i>Expediente</small>
                        </label>
                        <select class="form-control form-control-sm" id="listaExpedientes" data-placeholder="Selecciona expediente">
                            <option value="0">Selecciona expediente</option>
                            <?php foreach($consultaExpedientes as $datoExpediente) { ?>
                            <option value="<?=$datoExpediente["id"]?>"><?php echo $datoExpediente["id"] . " - " . $datoExpediente["exp"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaAudiencia">
                            <small><i class="fas fa-calendar-alt mr-2 text-gold-light"></i>Fecha audiencia</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="fechaAudiencia" placeholder="Selecciona fecha y hora" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="comentario">
                            <small><i class="fas fa-comment-alt mr-2 text-gold-light"></i>Comentario</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="comentario" placeholder="Ingresa comentario" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del scrip encargado de crear nuevos clientes. -->
<script src="manager/super-administrador/agenda/crear.js" defer="true"></script>