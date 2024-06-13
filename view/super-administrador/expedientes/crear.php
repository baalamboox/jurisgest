<?php

    require_once "../../../config/database/Conexion.php";

    $conexion = new Conexion();
    // Obtener la conexión a la base de datos.
    $obtenerConexion = $conexion->obtener();
    // Consulta para mostrar datos del cliente y junta
    $sqlClientes = "SELECT id, nom, aPat, aMat FROM tbl_cli";
    $sqlJuntas = "SELECT id, nJunt FROM tbl_junt";
    // Prepara la consulta SQL usando una conexión previamente obtenida       
    $consultaClientes = $obtenerConexion->query($sqlClientes);
    $consultaJuntas = $obtenerConexion->query($sqlJuntas);

?>
<!-- Este código crea un encabezado de tarjeta con un título y dos botones para crear una nueva expediente-->
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
    <!-- Este código crea contiene una alerta de éxito oculta y un formulario para la 
    creación de un nuevo expediente, con campos para ingresar el nombre del expediente, 
    empresa demandada, cliente, junta, nota y estado, utilizando datos dinámicos para 
    los campos de selección de clientes y juntas. --> 
    <div class="card-body">
        <!-- Alerta de éxito oculta para notificar la asignación de permiso de solo lectura a un expediente. -->
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionExpediente" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado un nuevo expediente.</p>
                </div>
            </div>
        </div>
        <form>
            <!-- Formulario para ingresar el nombre del expediente con un campo de texto y un ícono de archivo. -->
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
            <!--  Formulario para ingresar el nombre de la empresa demandada. -->
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
            <!-- Formulario para seleccionar un cliente y otra para seleccionar una junta, cada una con un grupo de formulario 
            y un campo de selección poblado dinámicamente con datos de clientes y juntas respectivamente. --> 
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
            <!--Formulario para ingresar una nota,
            con un campo de entrada de texto y un ícono de nota. -->
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
            <!--Formulario para seleccionar el estado, con opciones para 'Abierto' y 'Cerrado'. --> 
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