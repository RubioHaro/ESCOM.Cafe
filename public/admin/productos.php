<?php
session_start();
include "./validateAdmin.php";
include "../php/conexion.php";
$resultado=$conexion->query("select productos.*,categorias.nombre as catego from
    productos
    inner join categorias on productos.id_categoria=categorias.id
    order by id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ESCOM.café</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./dashboard/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 <!--<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./dashboard/dist/img//AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->

<?php include "./layouts/header.php";?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Insertar producto
            </button>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
      if(isset($_GET['error'])){
      ?>
        <div class="alert alert-danger" role="alert">
        <?php echo $_GET['error']?>
        </div>
      <?php }?>

      <?php
      if(isset($_GET['success'])){
      ?>
        <div class="alert alert-success" role="alert">
            Se ha insertado correctamente.
        </div>
      <?php }?>

      <?php
      if(isset($_GET['updated'])){
      ?>
        <div class="alert alert-dark" role="alert">
            Se ha modificado exitosamente.
        </div>
      <?php }?>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Inventario</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($f=mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $f['id'];?></td>
                    <td>
                        <img src="../images/<?php echo $f['imagen'];?>" width="20px" height="20px" alt="">
                        <?php echo $f['nombre'];?>
                    </td>
                    <td><?php echo $f['descripcion'];?></td>
                    <td><?php echo $f['inventario'];?></td>
                    <td><?php echo $f['catego'];?></td>
                    <td>$<?php echo number_format($f['precio'],2,'.','');?></td>
                    <td>
                        <button class="btn btn-danger btn-small btnEliminar"
                        data-id="<?php echo $f['id'];?>"
                        data-toggle="modal" data-target="#modalEliminar">
                            <i class="fa fa-trash"></i>
                        </button>
                        <button class="btn btn-warning btn-small btnEditar"
                        data-id="<?php echo $f['id'];?>"
                        data-nombre="<?php echo $f['nombre'];?>"
                        data-descripcion="<?php echo $f['descripcion'];?>"
                        data-inventario="<?php echo $f['inventario'];?>"
                        data-categoria="<?php echo $f['id_categoria'];?>"
                        data-precio="<?php echo $f['precio'];?>"
                        data-toggle="modal" data-target="#modalEditar">
                            <i class="fa fa-pencil-alt"></i>
                        </button>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- MODAL PARA INGRESAR UN NUEVO PRODUCTO -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="../php/insertarProducto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insertar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" placeholder="Descripción" id="descripcion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Imagen</label>
                <input type="file" name="imagen" accept="image/png,image/jpeg" id="imagen" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Precio</label>
                <input type="number" min="0" name="precio" placeholder="Precio" id="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Inventario</label>
                <input type="number" min="0" name="inventario" placeholder="Inventario" id="inventario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="categoria" id="categoria" class="form-control" required>
                <?php
                $res=$conexion->query("select * from categorias");
                while($f=mysqli_fetch_array($res)){
                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';
                }
                ?>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--MODAL PARA ELIMIANR UN PRODUCTO-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                ¿Desea eliminar el producto?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
        </div>
    </div>
  </div>
</div>

  <!-- MODAL PARA EDITAR UN PRODUCTO -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="../php/editarProducto.php" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEditar">Insertar Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="idEdit" name="id">
            <div class="form-group">
                <label for="">Nombre</label>
                <input type="text" name="nombre" placeholder="Nombre" id="nombreEdit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Descripción</label>
                <input type="text" name="descripcion" placeholder="Descripción" id="descripcionEdit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Imagen</label>
                <input type="file" name="imagen" accept="image/png,image/jpeg" id="imagenEdit" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Precio</label>
                <input type="number" min="0" name="precio" placeholder="Precio" id="precioEdit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Inventario</label>
                <input type="number" min="0" name="inventario" placeholder="Inventario" id="inventarioEdit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Categoría</label>
                <select name="categoria" id="categoriaEdit" class="form-control" required>
                <?php
                $res=$conexion->query("select * from categorias");
                while($f=mysqli_fetch_array($res)){
                    echo '<option value="'.$f['id'].'">'.$f['nombre'].'</option>';
                }
                ?>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include "./layouts/footer.php";?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="./dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./dashboard/plugins/moment/moment.min.js"></script>
<script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./dashboard/dist/js/pages/dashboard.js"></script>
<script src="../js/productos.js"></script>
</body>
</html>
