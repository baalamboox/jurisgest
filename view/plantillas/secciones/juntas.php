<?php  session_start(); ?>
<div class="row">
    <div class="col-lg-4 d-none d-block d-lg-none">
        <div class="card border border pb-2 mb-4">
            <div class="card-header border-0 bg-white">
                <i class="fas fa-list-ul mr-2 text-gold-dark"></i>
                Operaciones
            </div>
            <div class="card-body p-0">
                <div class="card border-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-lista-juntas"><i class="fas fa-handshake mr-2 text-gold-dark"></i>Lista de Juntas</span>
                        </li>
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-crear-junta"><i class="fas fa-plus mr-2 text-gold-dark"></i>Crear Junta</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8" id="contenedorSeccionesJuntas"></div>
    <div class="col-md-4 d-none d-lg-block">
        <div class="card border border pb-2">
            <div class="card-header border-0 bg-white">
                <i class="fas fa-list-ul mr-2 text-gold-dark"></i>
                Operaciones
            </div>
            <div class="card-body p-0">
                <div class="card border-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-lista-juntas"><i class="fas fa-handshake mr-2 text-gold-dark"></i>Lista de Juntas</span>
                        </li>
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-crear-junta"><i class="fas fa-plus mr-2 text-gold-dark"></i>Crear Junta</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Implementación de script para funcionalidades de los botones de las opciones de juntas. -->
<script src="manager/plantillas/secciones/juntas.js" defer="true"></script>