<!-- Aquí empieza el encabezado. -->
<div class="animate__animated animate__slideInDown">
    <div class="container-fluid bg-img-header">

        <!-- Aquí empieza la primera sección del encabezado (Logotipo de GCA). -->
        <div class="row">
            <div class="col p-0">
                <div class="jumbotron mb-0 rounded-0 p-4 bg-gray-special-blur">
                    <div class="d-flex justify-content-center">
                        <img src="<?=URL_SERVIDOR?>/public/images/logotipos/gca-blanco.png" class="img-fluid mx-auto border-bottom-gold-light">
                    </div>
                </div>
            </div>
        </div>

        <!-- Aquí empieza la segunda sección del encabezado (Barra de navegación). -->
        <div class="row">
            <div class="col p-0">
                <nav class="navbar navbar-expand-lg navbar-light p-0 bg-black-special-blur">
                    <span class="nav-link rounded text-gold-light px-4 nav-item-bg-white-hover" id="botonInicio"><i class="fas fa-home mr-1"></i>Inicio</span>
                    <span class="navbar-toggler text-white" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </span>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Aquí empieza la barra de navegación para dispositivos de escritorio. -->
                        <div class="w-100 d-none d-lg-flex">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" id="botonContactanos"><i class="fas fa-address-card mr-2"></i>Contactanos</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-users mr-2"></i>Clientes</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-folder-open mr-2"></i>Expedientes</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-book mr-2"></i>Agenda</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-handshake mr-2"></i>Juntas</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-user-friends mr-2"></i>Usuarios</a>
                                </li>
                            </ul>
                            <div class="my-lg-0">
                                <div class="btn-group">
                                    <span class="btn text-white dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-user-circle mr-2s"></i>
                                        (Super Administrador)
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right bg-black-special-blur p-2 mt-2">
                                        <h6 class="dropdown-header text-gold-dark text-center mb-3">Guillermo Jiménez
                                        </h6>
                                        <a href="" class="dropdown-item text-white nav-item-bg-gold-hover rounded"><i class="fas fa-unlock mr-2"></i>Cambiar contraseña</a>
                                        <hr class="p-0 mt-2 mb-3 bg-black-special-alfa" />
                                        <div class="text-center mb-2">
                                            <a href="" class="btn btn-gold-light btn-sm text-center text-white"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aquí empieza la barra de navegación para dispositivos móviles. -->
                        <div class="d-none d-block d-lg-none">
                            <ul class="navbar-nav mr-auto px-3">
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-address-card mr-2"></i>Contactanos</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-users mr-2"></i>Clientes</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-folder-open mr-2"></i>Expedientes</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-book mr-2"></i>Agenda</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-handshake mr-2"></i>Juntas</a>
                                </li>
                                <li class="nav-item nav-item-bg-gold-hover rounded px-2">
                                    <a class="nav-link text-white" href="#"><i class="fas fa-user-friends mr-2"></i>Usuarios</a>
                                </li>
                            </ul>
                            <hr class="p-0 mt-2 mb-2 bg-black-special-alfa" />
                            <div class="my-lg-0 px-3">
                                <span class="btn w-100 text-left text-white px-2" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-user-circle mr-2s"></i>
                                    (Super Administrador)
                                </span>
                                <div class="collapse mt-1 mb-3" id="collapseExample">
                                    <div class="card card-body bg-black-special-blur">
                                        <h6 class="dropdown-header text-gold-dark text-center mb-3">Guillermo Jiménez</h6>
                                        <a href="" class="dropdown-item text-white nav-item-bg-gold-hover rounded"><i class="fas fa-unlock mr-2"></i>Cambiar contraseña</a>
                                        <hr class="p-0 mt-2 mb-3 bg-black-special-alfa" />
                                        <div class="text-center mb-2">
                                            <a href="" class="btn btn-gold-light btn-sm text-center text-white"><i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="w-100 hr-header"></div>
</div>