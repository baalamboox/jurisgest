<?php

    // Se usa el método siguiente para poder hacer uso de las varables de sesión.
    session_start();

    // Compara si no hay sesión activa para poder iniciar sesión e ir a su sección.
    if(!isset($_SESSION["usuario"])) {
?>
<div class="container-fluid d-flex vh-100 justify-content-center align-items-center bg-gray-special-blur">

    <!-- Aquí empieza contenedor del inicio de sesión. -->
    <div class="row rounded-lg w-75 overflow-hidden shadow-lg animate__animated animate__zoomIn">

        <!-- Aquí empieza la fila que contiene la dos secciones del inicio de sesión. -->
        <div class="row w-100 mx-0">

            <!-- Aquí empieza la columna que contiene el logo GCA e info. -->
            <div class="col-md-7 p-3 bg-gray-special">
                <h5 class="text-white border-bottom-gold-light">Inicio de sesión</h5>
                <div class="d-none d-sm-block">
                    <div class="mx-5 py-5">
                        <img src="<?=URL_SERVIDOR?>/public/images/logotipos/gca-blanco.png" class="img-fluid">
                    </div>
                    <div>
                        <p class="text-muted text-justify mx-5">Somos un despacho con un cuerpo legal de 50 abogados especializados en la defensa del trabajador frente a los Juzgados Laborales.</p>
                    </div>
                </div>
            </div>

            <!-- Aquí empieza la columna que contiene el formulario de inicio de sesión. -->
            <div class="col-md-5 p-5 bg-black-special-blur">
                <form class="text-white">
                    <div class="form-group">
                        <label for="usuario">
                            <small><i class="fas fa-user-circle mr-1"></i>Usuario</small>
                        </label>
                        <input type="email" name="usuario" id="usuario" class="form-control form-control-sm gold-border-input" placeholder="Ingresa tu usuario" />
                    </div>
                    <div class="form-group">
                        <label for="contra">
                            <small><i class="fas fa-lock mr-1"></i>Contraseña</small>
                        </label>
                        <input type="password" name="contra" id="contra" class="form-control form-control-sm gold-border-input" placeholder="Ingresa tu contraseña" />
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="mostrarOcultarContra">
                        <label class="form-check-label" for="mostrarOcultarContra">Mostrar contraseña</label>
                    </div>
                    <span class="btn btn-gold-light btn-block btn-sm mt-4" id="botonIniciarSesion"><i class="fas fa-sign-in-alt mr-1"></i>Ingresar</span>
                </form>
            </div>
        </div>

        <!-- Aquí empieza el pie de página del inicio de sesión. -->
        <div class="row w-100 mx-0 py-3 bg-black-special">
            <div class="d-flex justify-content-end w-100 px-2">
                <small class="text-white" data-toggle="tooltip" data-placement="bottom" title="¡Ponte en contacto con el Super Administrador!">
                    ¿Olvidaste tu contraseña?
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Implementación del script para el manejo de inicio de sesión. -->
<script src="manager/autenticacion/iniciar-sesion.js" defer="true"></script>
<?php
    } else {
        header("location:" . $_SESSION["ruta"]);
        exit();
    }
?>