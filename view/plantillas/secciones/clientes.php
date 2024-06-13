<?php  session_start(); ?>
<div class="row">
    <!-- crea una tarjeta oculta en pantallas grandes que muestra un menú de "Operaciones" 
    con opciones para listar clientes y, si el perfil de usuario es 1, también para crear un cliente. -->
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
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-lista-clientes"><i class="fas fa-users mr-2 text-gold-dark"></i>Lista de clientes</span>
                        </li>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-crear-cliente"><i class="fas fa-user-plus mr-2 text-gold-dark"></i>Crear cliente</span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8" id="contenedorSeccionesClientes"></div>
    <!-- crea una tarjeta visible solo en pantallas grandes que muestra un menú de 
    "Operaciones" con opciones para listar clientes y, si el perfil del usuario es 1, 
    también para crear un cliente. -->
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
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-lista-clientes"><i class="fas fa-users mr-2 text-gold-dark"></i>Lista de clientes</span>
                        </li>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-crear-cliente"><i class="fas fa-user-plus mr-2 text-gold-dark"></i>Crear cliente</span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Implementación de script para funcionalidades de los botones de las opciones del clientes. -->
<script src="manager/plantillas/secciones/clientes.js" defer="true"></script>