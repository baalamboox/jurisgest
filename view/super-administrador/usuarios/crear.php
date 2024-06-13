<div class="card shadow p-4 border-0">
    <!-- Cabecera de tarjeta con título "Creación de usuario" y botones para crear y agregar nuevo usuario -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-plus mr-2 text-gold-light"></i>
            Creación de usuario
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearUsuario"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevoUsuario"><i class="fas fa-user-plus mr-2"></i>Nuevo</span>
        </div>
    </div>
    <div class="card-body">
        <!-- Notificación de éxito oculta para la creación de usuario con detalles de usuario y contraseña -->
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionUsuario" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado un nuevo usuario, favor de guardar bien las credenciales de autenticación siguientes en un lugar seguro.</p>
                    <hr class="border-dark" />
                    <p class="mb-0 text-dark d-flex justify-content-between">
                        <span>Usuario: <strong id="usuarioCreado"></strong></span>
                        <span>Contraseña: <strong id="contraCreada"></strong></span>
                    </p>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <!-- Formulario para ingresar correo electrónico con ícono -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="correoElectronico">
                            <small><i class="fas fa-at mr-2 text-gold-light"></i>Correo electrónico</small>
                        </label>
                        <input type="email" class="form-control form-control-sm" id="correoElectronico" placeholder="Ingresa correo electrónico" />
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Formulario para ingresar nombres y apellidos con íconos -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombres">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombres" placeholder="Ingresa nombre(s)" />
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="apellidos">
                        <small><i class="fas fa-user mr-2 text-gold-light"></i>Apellidos</small>
                    </label>
                    <input type="text" class="form-control form-control-sm" id="apellidos" placeholder="Ingresa apellido(s)" />
                </div>
            </div>
            <div class="row">
                <!-- Formulario para seleccionar el perfil de usuario con opciones predefinidas -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="perfil">
                            <small><i class="fas fa-user-circle mr-2 text-gold-light"></i>Perfil</small>
                        </label>
                        <select class="form-control form-control-sm" id="perfil" />
                        <option value="0">Selecciona perfil</option>
                        <option value="1">Super Administrador</option>
                        <option value="2">Administrador</option>
                        <option value="3">Usuario</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del scrip encargado de crear nuevos usuarios. -->
<script src="manager/super-administrador/usuarios/crear.js" defer="true"></script>