<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-plus mr-2 text-gold-light"></i>
            Creación de Audiencia
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearAudiencia"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevaAudiencia"><i class="fas fa-clipboard-list mr-2"></i>Nuevo</span>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombres">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</small>
                        </label>
                        <input type="" class="form-control form-control-sm" id="nombres" placeholder="Ingresa nombre(s)" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidoPaterno">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellido paterno</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="apellidoPaterno" placeholder="Ingresa apellido paterno" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidoMaterno">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellido materno</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="apellidoMaterno" placeholder="Ingresa apellido materno" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="calle">
                            <small><i class="fas fa-road mr-2 text-gold-light"></i>Calle</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="calle" placeholder="Ingresa calle" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numeroExterior">
                            <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Número exterior</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="numeroExterior" placeholder="Ingresa número" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="numeroInterior">
                            <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Número interior</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="numeroInterior" placeholder="Ingresa número" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="colonia">
                            <small><i class="fas fa-city mr-2 text-gold-light"></i>Colonia</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="colonia" placeholder="Ingresa colonia" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ciudad">
                            <small><i class="fas fa-university mr-2 text-gold-light"></i>Ciudad</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="ciudad" placeholder="Ingresa ciudad" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="estado">
                            <small><i class="fas fa-flag mr-2 text-gold-light"></i>Estado</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="estado" placeholder="Ingresa estado" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="codigoPostal">
                            <small><i class="fas fa-sort-numeric-up-alt mr-2 text-gold-light"></i>Código postal</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="codigoPostal" placeholder="Ingresa código postal" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono1">
                            <small><i class="fas fa-phone-alt mr-2 text-gold-light"></i>Teléfono 1</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="telefono1" placeholder="Ingresa teléfono" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono2">
                            <small><i class="fas fa-phone-alt mr-2 text-gold-light"></i>Teléfono 2</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="telefono2" placeholder="Ingresa teléfono" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular">
                            <small><i class="fas fa-mobile mr-2 text-gold-light"></i>Celular</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="celular" placeholder="Ingresa celular" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correoElectronico">
                            <small><i class="fas fa-at mr-2 text-gold-light"></i>Correo electrónico</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="correoElectronico" placeholder="Ingresa correo electrónico" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del scrip encargado de crear nuevos clientes. -->
<script src="manager/super-administrador/clientes/crear.js" defer="true"></script>