<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ESCOM.Cafe Inicio</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link rel="stylesheet" href="./../css/magnific-popup.css">
    <link rel="stylesheet" href="./../css/jquery-ui.css">
    <link rel="stylesheet" href="./../css/owl.carousel.min.css">
    <link rel="stylesheet" href="./../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./../css/aos.css">
    <link href="./../css/style.css" rel="stylesheet" />
    <?php require './../shared/header.php'; ?>
</head>

<body>
    <!-- Navigation-->
    <?php require './../shared/nvar.php'; ?>

    <div class="site-wrap">
        <!-- section HEADER -->
        <section class="bg-dark py-5 bg-header">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">ESCOM.Cafe</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Descansate un momento con café</p>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12 order-2 pt-4 pb-4">
                    <div class="row mb-5">
                        <!--ABRIMOS PHP-->
                        <?php
                        include('./../php/conexion.php');
                        $limite = 9;
                        $totalQuery = $conexion->query('select count(*) from productos') or die($conexion->error);
                        $totalProductos = mysqli_fetch_row($totalQuery);
                        $totalBotones = ceil($totalProductos[0] / $limite);

                        if (isset($_GET['limite'])) {
                            $resultado = $conexion->query("select * from productos where inventario>0 order by id DESC limit " . $_GET['limite'] . "," . $limite) or die($conexion->error);
                        } else {
                            $resultado = $conexion->query("select * from productos where inventario>0 order by id DESC limit " . $limite) or die($conexion->error);
                        }


                        //Fetch_array divide la respuesta en un arreglo
                        while ($fila = mysqli_fetch_array($resultado)) {

                        ?>

                            <div class="col-sm-6 col-lg-4 mb-4">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="shop-single.php?id=<?php echo $fila['id']; /*Id del producto*/ ?>"><img src="./../images/<?php echo $fila['imagen']; /*Imagen del producto*/ ?>" alt="<?php echo $fila['nombre']; /*Nombre del producto para el place holder*/ ?>" class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="shop-single.php?id=<?php echo $fila['id']; /*Id del producto*/ ?>"><?php echo $fila['nombre']; /*Nombre del producto*/ ?></a></h3>
                                        <p class="mb-0"><?php echo $fila['descripcion']; /*Descripcion del producto*/ ?></p>
                                        <p class="text-primary font-weight-bold">$<?php echo $fila['precio']; /*Precio del producto*/ ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php } /*Fin del while*/ ?>



                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <?php
                                    if (isset($_GET['limite'])) {
                                        if ($_GET['limite'] > 0) {
                                            echo '<li><a href="index.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                                        }
                                    }

                                    for ($k = 0; $k < $totalBotones; $k++) {
                                        echo '<li><a href="index.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                                    }

                                    if (isset($_GET['limite'])) {
                                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                                            echo '<li><a href="index.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                                        }
                                    } else {
                                        echo '<li><a href="index.php?limite=10">&gt;</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section-->
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; ESCOM.cafe</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <!-- Core theme JS-->
    <!-- <script src="./../js/scripts.js"></script> -->
    <!-- <script src="./../js/jquery-3.3.1.min.js"></script> -->
    <script src="./../js/jquery-ui.js"></script>
    <!-- <script src="./../js/popper.min.js"></script> -->
    <!-- <script src="./../js/bootstrap.min.js"></script> -->
    <script src="./../js/owl.carousel.min.js"></script>
    <script src="./../js/jquery.magnific-popup.min.js"></script>
    <script src="./../js/aos.js"></script>
</body>

</html>