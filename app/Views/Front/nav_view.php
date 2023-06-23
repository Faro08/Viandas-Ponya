<body>
    <!-- <header class="fixed-top bg-white"> -->
    <header class="fixed-top bg-header">
        <nav class="navbar navbar-expand-lg" data-bs-theme="dark"
            style="box-shadow: 0 2px 9px -1px hsl(0deg 2% 48% / 60%)">
            <?php print_r(session()->perfil_id)?>
            <div class="container-fluid nav-container">
                <a class="navbar-brand" href="<?php echo base_url('');?>">
                    <img class="img-fluid header-logo"
                        src=<?php echo base_url ("assets/img/logo-viandas-ponya-verde-blanco.png");?>
                        alt="Logo Viandas Ponya" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- ADMIN -->
                <?php if (session()->perfil_id ==1): ?>
                <!-- <div class="btn btn-danger active  btnUser btn-sm">
                    <a href="">ADMIN:<?php echo session('nombre'); ?> </a>
                </div> -->
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto text-white ">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('');?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('crear');?>">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('crud-usuarios');?>">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('compras');?>">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('consultas');?>">Consultas</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="icon-color-white"
                                    src="<?php echo base_url("assets/bootstrap-icons-1.10.4/person-circle.svg");?>"
                                    alt="icono usuario" width="25" height="25">
                            </a>
                            <!--  <a class="nav-item dropdown-toggle" role="button"><img class="icon-color-white"
                                    src="assets/bootstrap-icons-1.10.4/person-fill.svg" alt="icono facebook" width="25"
                                    height="25" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i></a> -->

                            <ul class="dropdown-menu">
                                <li>
                                    <p class="dropdown-item">Administrador: <br><?php echo session('nombre'); ?></p>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo base_url('logout');?>">Salir</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <!-- USUARIO -->
                <?php elseif(session()->perfil_id == 2): ?>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto text-white ">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('');?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('catalogo-productos');?>">Platos</a>
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
                                <img class="icon-color-white"
                                    src="<?php echo base_url("assets/bootstrap-icons-1.10.4/person-circle.svg");?>"
                                    alt="icono usuario" width="25" height="25">
                            </a>
                            <!--  <a class="nav-item dropdown-toggle" role="button"><img class="icon-color-white"
                                    src="assets/bootstrap-icons-1.10.4/person-fill.svg" alt="icono facebook" width="25"
                                    height="25" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i></a> -->

                            <ul class="dropdown-menu">
                                <li>
                                    <p class="dropdown-item">Usuario: <?php echo session('nombre'); ?></p>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo base_url('compras');?>">Mis compras</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?php echo base_url('logout');?>">Salir</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <?php 
                            $session = session();
                            $cart = \Config\Services::cart();
                            $cart = $cart->contents(); 
                            
                            if(empty($cart)):?>

                            <a class="nav-link" href="<?php echo base_url('carrito');?>"><img class="icon-color-white"
                                    src="<?php echo base_url("assets/bootstrap-icons-1.10.4/cart.svg");?>"
                                    alt="icono carrito" width="25" height="25">
                            </a>
                            <?php else : ?>
                            <a class="nav-link" href="<?php echo base_url('carrito');?>"><img class="icon-color-white"
                                    src="<?php echo base_url("assets/bootstrap-icons-1.10.4/cart-check-fill.svg");?>"
                                    alt="icono carrito" width="25" height="25">
                            </a>
                            <?php endif ; ?>
                        </li>


                    </ul>
                </div>

                <!-- VISITANTE -->
                <?php else: ?>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto text-white ">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('');?>">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('catalogo-productos');?>">Platos</a>
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
                                <img class="icon-color-white"
                                    src="<?php echo base_url("assets/bootstrap-icons-1.10.4/person-circle.svg");?>"
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
                    </ul>
                </div>

                <?php endif; ?>


            </div>
        </nav>
    </header>