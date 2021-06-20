<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">ESCOM.Cafe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Inicio</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menú</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Todos los productos</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
                <style>
                    .site-block-top-search {
                        position: relative;
                    }

                    .site-block-top-search .icon {
                        position: absolute;
                        left: 10px;
                        top: 50%;
                        -webkit-transform: translateY(-50%);
                        -ms-transform: translateY(-50%);
                        transform: translateY(-50%);
                    }

                    .site-block-top-search input {
                        padding-left: 50px;
                        -webkit-transition: .3s all ease-in-out;
                        -o-transition: .3s all ease-in-out;
                        transition: .3s all ease-in-out;
                        background-color: transparent;
                        outline-width: 0 !important;
                    }

                    .site-block-top-search input:focus,
                    .site-block-top-search input:active {
                        padding-left: 35px;
                        outline-width: 0 !important;
                        outline: 0 none !important;
                        -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
                        -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
                    }
                </style>
                <li class="nav-item">
                    <div class="pl-5 or|r-2 order-md-1 site-search-icon text-left">
                        <form action="./busqueda.php" class="site-block-top-search" method="GET">
                            <!-- <span class="icon icon-search2"></span> -->
                            <i class="icon bi bi-search align-middle"></i>
                            <input style="text-decoration: none;" type="text" class="form-control border-0" name="texto" placeholder="Busqueda">
                        </form>
                    </div>
                </li>
            </ul>
            <form class="d-flex navbar-nav">
                <a class="nav-link active" aria-current="page" href="#!">
                    Cart <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php
                        if (isset($_SESSION['carrito'])) {
                            echo count($_SESSION['carrito']);
                        } else {
                            echo 0;
                        }
                        ?></span>
                    </span>
                </a>
                <li class="widget nav-item dropdown d-inline-block">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person size align-middle"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="/users/profileC"><i class="bi bi-person"></i> Mi perfil</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/users/pedidosC"><i class="bi bi-bag"></i> Pedidos</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="/authentication/logout"><i class="bi bi-box-arrow-left"></i>
                                Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </form>

        </div>
    </div>
</nav>