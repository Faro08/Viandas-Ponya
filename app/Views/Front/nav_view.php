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
                    </ul>
                </div>
            </div>
        </nav>
    </header>