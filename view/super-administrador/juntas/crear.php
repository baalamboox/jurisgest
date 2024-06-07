<div class="card shadow p-4 border-0">
    <div class="card-header d-flex bg-white justify-content-between">
        <div class="d-flex align-items-center">
            <i class="fas fa-handshake mr-2 text-gold-light"></i>
            Creación de Junta
        </div>
        <div>
            <span class="btn btn-sm btn-gold-light rounded" id="crearJunta"><i class="fas fa-plus mr-2"></i>Crear</span>
            <span class="btn btn-sm btn-gold-light rounded" id="nuevaJunta"><i class="fas fa-handshake mr-2"></i>Nuevo</span>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="alert alert-success mb-3" role="alert" id="creacionJunta" hidden="true">
                    <h4 class="alert-heading text-dark"><strong>¡Genial!</strong></h4>
                    <p class="text-dark">Ha creado una nueva junta.</p>
                </div>
            </div>
        </div>
        <form>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="juntas">
                            <small><i class="fas fa-location-arrow mr-2 text-gold-light"></i>Junta</small>
                        </label>
                        <input type="text" class="form-control form-control-sm" id="nombreJunta" placeholder="Ingresa nombre de junta" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Implementación del script encargado de crear nuevas juntas. -->
<script src="manager/super-administrador/juntas/crear.js" defer="true"></script>