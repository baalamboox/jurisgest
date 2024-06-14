<?php

    require_once "../../../config/database/Conexion.php";

    // Obtener la conexión a la base de datos.
    $conexion = new Conexion();

    $obtenerConexion = $conexion->obtener();
    // Consulta para mostrar datos del usuario y expediente.
    $sqlUsuarios = "SELECT id, usr, CONCAT(nom, \" \", ape) as usuario FROM tbl_usr WHERE perf=3";
    $sqlExpedientes = "SELECT id, exp FROM tbl_exp";
    // Prepara la consulta SQL usando una conexión previamente obtenida     
    $consultaUsuarios = $obtenerConexion->query($sqlUsuarios);
    $consultaExpedientes = $obtenerConexion->query($sqlExpedientes);

?>
<div class="card shadow p-4 border-0">
    <!-- Cabecera de tarjeta con ícono de usuarios y texto "Otorgar permiso Expediente-Usuario", alineación horizontal y justificación entre los extremos -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-check mr-2 text-gold-light"></i>
            Otorgar permiso Expediente-Usuario
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="darPermiso"><i class="fas fa-check-circle mr-2"></i>Dar permiso</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevoPermiso"><i class="fas fa-user-check mr-2"></i>Nuevo permiso</span>
        </div>
    </div>
    <div class="card-body">
        <!-- Alerta de éxito oculta para notificar la asignación de permiso de solo lectura a un expediente. -->
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="permisoExpediente" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Haz asignado permiso de solo lectura a un expediente.</p>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <!-- Selector de expedientes con lista dinámica poblada desde consulta PHP -->
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
                    <!-- Selector de usuarios con lista dinámica poblada desde consulta PHP -->
                    <div class="form-group">
                        <label for="listaUsuarios">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Usuario</small>
                        </label>
                        <select class="form-control form-control-sm" id="listaUsuarios" data-placeholder="Selecciona usuario">
                            <option value="0">Selecciona usuario</option>
                            <?php foreach($consultaUsuarios as $datoUsuario) { ?>
                            <option value="<?=$datoUsuario["id"]?>"><?php echo $datoUsuario["usr"] . " - " . $datoUsuario["usuario"]?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del script encargado de crear nuevos expedientes. -->
<script src="manager/super-administrador/expedientes/otorgar-permiso.js" defer="true"></script>