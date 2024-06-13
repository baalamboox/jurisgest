<div class="card shadow p-4 border-0">
    <!-- Este código crea un encabezado de tarjeta con un título y dos botones para crear un nuevo cliente -->
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-user-plus mr-2 text-gold-light"></i>
            Creación de cliente
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearCliente"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevoCliente"><i class="fas fa-user-plus mr-2"></i>Nuevo</span>
        </div>
    </div>
    <!-- Formulario para la creación de un nuevo cliente, 
    con campos para ingresar nombre, apellidos, dirección, teléfono y correo electrónico. -->
    <div class="card-body">
        <div class="row">
            <!-- Alerta de éxito oculta para notificar la creación de un nuevocliente -->
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionCliente" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado un nuevo cliente.</p>
                    <hr class="border-dark" />
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <!-- Fornulario para ingresar nombre(s) y apellido paterno,
                utilizando campos de entrada de texto -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombres">
                            <small><i class="fas fa-user mr-2 text-gold-light"></i>Nombre(s)</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombres" placeholder="Ingresa nombre(s)" />
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
                <!-- Formulario para ingresar el apellido materno con un ícono de usuario, utilizando un campo de entrada de texto -->
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
                <!-- formulario para una columna completa para ingresar el nombre de una calle -->
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
                <!--Formulario  para ingresar el número exterior e interior
                y la colonia, con íconos de números ascendentes y ciudad respectivamente -->
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
                <!-- Formulario para ingresar la ciudad y el estado -->
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
                <!-- Formulario para ingresar el código postal, con un ícono de números ascendentes -->
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
                <!--Formulario para ingresar teléfono 1, teléfono 2 y celular respectivamente -->
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
                <!--Formulario para ingresar correo electrónico  -->
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