<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-plus mr-2 text-gold-light"></i>
            Creación de usuario
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearUsuario"><i class="fas fa-plus mr-2"></i>Crear</span>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correoElectronico">
                            <small><i class="fas fa-at mr-2 text-gold-light"></i>Correo electrónico</small>
                        </label>
                        <input type="email" class="form-control form-control-sm" id="correoElectronico" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombres">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombres" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="apellidos">
                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellidos</small>
                    </label>
                    <input type="text" class="form-control form-control-sm" id="apellidos" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="perfil">
                            <small><i class="fas fa-user-circle mr-2 text-gold-light"></i>Perfil</small>
                        </label>
                        <select class="form-control form-control-sm" id="perfil" />
                            <option value="1">Super Administrador</option>
                            <option value="2">Administrador</option>
                            <option value="3">Usuario</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estatus">
                            <small><i class="fas fa-eye mr-2 text-gold-light"></i>Estatus</small>
                        </label>
                        <select class="form-control form-control-sm" id="estatus" />
                            <option value="">Activo</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>