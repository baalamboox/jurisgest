<?php  session_start(); ?>
<div class="row">
    <div class="col-md-8" id="contenedorSeccionesUsuarios"></div>
    <div class="col-md-4">
        <div class="card border border pb-2">
            <div class="card-header border-0 bg-white">
                <i class="fas fa-list-ul mr-2 text-gold-dark"></i>
                Operaciones
            </div>
            <div class="card-body p-0">
                <div class="card border-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-lista-usuarios"><i class="fas fa-user-friends mr-2 text-gold-dark"></i>Lista de usuarios</span>
                        </li>
                        <?php if($_SESSION["perfil"] == 1) { ?>
                        <li class="list-group-item border-0 py-1">
                            <span class="btn btn-white btn-block btn-sm rounded text-left text-underline boton-crear-usuario"><i class="fas fa-user-plus mr-2 text-gold-dark"></i>Crear usuario</span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Implementación de script para funcionalidades de los botones de las opciones del usuarios. -->
<script src="manager/plantillas/secciones/usuarios.js" defer="true"></script>