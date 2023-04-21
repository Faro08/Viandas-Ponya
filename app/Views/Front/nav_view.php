<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-white"
            style="box-shadow: 0 2px 9px -1px hsl(0deg 2% 48% / 60%)">

            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url('');?>">
                    <img src="assets/img/logo-viandas-ponya-2.png" alt="Logo Viandas Ponya" height="70" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse color-white" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- <li class="nav-item">
                <a class="nav-link" href="#">PROPIEDADES</a>
              </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Plato del dia
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Carne</a></li>
                                <li><a class="dropdown-item" href="#">Vegetariano</a></li>
                                <li><a class="dropdown-item" href="#">Saludable</a></li>
                                <!-- <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li> -->
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                <a class="nav-link" href="#">PUBLICAR</a>
              </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Viandas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Semanales</a></li>
                                <li><a class="dropdown-item" href="#">Mensuales</a></li>
                                <!-- <li><hr class="dropdown-divider" /></li>
                  <li><a class="dropdown-item" href="#">INMOBILIARIAS</a></li> -->
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