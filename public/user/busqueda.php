<?php
session_start();
include('./../php/conexion.php');
if (!isset($_GET['texto'])) {
  header("Location: ./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tienda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="./../fonts/icomoon/style.css">

  <link rel="stylesheet" href="./../css/bootstrap.min.css">
  <link rel="stylesheet" href="./../css/magnific-popup.css">
  <link rel="stylesheet" href="./../css/jquery-ui.css">
  <link rel="stylesheet" href="./../css/owl.carousel.min.css">
  <link rel="stylesheet" href="./../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="./../css/aos.css">
  <link rel="stylesheet" href="./../css/style.css">
  <?php include("./../shared/header.php"); ?>
</head>

<body>

  <div class="site-wrap">
    <!-- Navigation-->
    <?php require './../shared/nvar.php'; ?>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 order-2">
            <div class="row mb-5">
              <!--ABRIMOS PHP-->
              <?php

              $limite = 9;
              $totalQuery = $conexion->query("select count(*) from productos where inventario>0 and
              nombre like '%" . $_GET['texto'] . "%' or
              descripcion like '%" . $_GET['texto'] . "%'") or die($conexion->error);
              $totalProductos = mysqli_fetch_row($totalQuery);
              $totalBotones = ceil($totalProductos[0] / $limite);

              if (isset($_GET['limite'])) {
                $resultado = $conexion->query("select * from productos where inventario>0 and
                nombre like '%" . $_GET['texto'] . "%' or
                descripcion like '%" . $_GET['texto'] . "%' order by id DESC limit " . $_GET['limite'] . "," . $limite) or die($conexion->error);
              } else {
                $resultado = $conexion->query("select * from productos where inventario>0 and
                nombre like '%" . $_GET['texto'] . "%' or
                descripcion like '%" . $_GET['texto'] . "%' order by id DESC limit " . $limite) or die($conexion->error);
              }

              if (mysqli_num_rows($resultado) > 0) {

                while ($fila = mysqli_fetch_array($resultado)) {

              ?>

                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
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

                <?php }
                ?>
            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <?php
                    if (isset($_GET['limite'])) {
                      if ($_GET['limite'] > 0) {
                        echo '<li><a href="busqueda.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                      }
                    }

                    for ($k = 0; $k < $totalBotones; $k++) {
                      echo '<li><a href="busqueda.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                    }

                    if (isset($_GET['limite'])) {
                      if ($_GET['limite'] + 10 < $totalBotones * 10) {
                        echo '<li><a href="busqueda.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                      }
                    } else {
                      echo '<li><a href="busqueda.php?limite=10">&gt;</a></li>';
                    }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        <?php
              } /*Fin del while*/ else {
                echo '<h2>Sin resultados</h2>';

        ?>
        </div>
        <!-- <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">

          </div>
        </div> -->
      </div>
    <?php
              } ?>
    </div>

  </div>
  </div>
  <?php include("./../shared/footer.php"); ?>


  </div>

  <script src="./../js/jquery-3.3.1.min.js"></script>
  <script src="./../js/jquery-ui.js"></script>
  <script src="./../js/popper.min.js"></script>
  <script src="./../js/bootstrap.min.js"></script>
  <script src="./../js/owl.carousel.min.js"></script>
  <script src="./../js/jquery.magnific-popup.min.js"></script>
  <script src="./../js/aos.js"></script>

  <script src="./../js/main.js"></script>

</body>

</html>