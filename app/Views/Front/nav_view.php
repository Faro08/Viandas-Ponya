<body>
    <!-- <header class="fixed-top bg-white"> -->
    <header class="fixed-top bg-header">
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark"
            style="box-shadow: 0 2px 9px -1px hsl(0deg 2% 48% / 60%)">

            <div class="container-fluid nav-container">
                <a class="navbar-brand" href="<?php echo base_url('');?>">
                    <img class="img-fluid header-logo" src="assets/img/logo-viandas-ponya-verde-blanco.png"
                        alt="Logo Viandas Ponya" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if (session()->perfil_id ==1): ?>
                <div class="btn btn-danger active  btnUser btn-sm">
                    <a href="">ADMIN:<?php echo session('nombre'); ?> </a>
                </div>
                <?php elseif(session()->perfil_id == 2): ?>
                <div class="btn btn-danger active  btnUser btn-sm">
                    <a href="">USUARIO:<?php echo session('nombre'); ?> </a>
                </div>
                <?php endif; ?>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto text-white ">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('');?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Plato del dia
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('products');?>">Carne</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('wip');?>">Vegetariano</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('wip');?>">Saludable</a></li>

                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Viandas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('wip');?>">Semanales</a></li>
                                <li><a class="dropdown-item" href="<?php echo base_url('wip');?>">Mensuales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('about');?>">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('commerce');?>">Como comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('contact');?>">Contacto</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="icon-color-white" src="assets/bootstrap-icons-1.10.4/person-circle.svg"
                                    alt="icono usuario" width="25" height="25">
                            </a>
                            <!--  <a class="nav-item dropdown-toggle" role="button"><img class="icon-color-white"
                                    src="assets/bootstrap-icons-1.10.4/person-fill.svg" alt="icono facebook" width="25"
                                    height="25" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i></a> -->

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo base_url('login');?>">Ingresar</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo base_url('register');?>">Registrarse</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('contact');?>"><img class="icon-color-white"
                                    src="assets/bootstrap-icons-1.10.4/cart.svg" alt="icono carrito" width="25"
                                    height="25">
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>