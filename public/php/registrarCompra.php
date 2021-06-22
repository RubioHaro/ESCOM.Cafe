<?php
  session_start();
  include '../php/conexion.php';
  include '../php/userClass.php';
  if(!isset($_SESSION['carrito'])){
    header("Location: ./index.php");
  }
  if(!isset($_COOKIE['userEmail'])){
    header("Location: ./login.php");
  }
  $User = new User;
  $arreglo=$_SESSION['carrito'];
  $total=0;
  $idUser= $User->getUserId(); //Sustituir aquÃ­ el id de la variable de SESSION
  $comprobarinventario=0;

  for($i=0;$i<count($arreglo);$i++){
    $total=$total+($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad']);
    $resultado=$conexion->query("select inventario from productos where id=".$arreglo[$i]['Id']."")or die($conexion->error);
    $restante=mysqli_fetch_row($resultado);
    $comprobarinventario=$restante[0]-$arreglo[$i]['Cantidad'];
    if($comprobarinventario<0){
       break;
    }
  }

  $consultaSaldo=$conexion->query("select saldo from saldo_electronico where id_usuario=$idUser");
  $arraySaldo=mysqli_fetch_row($consultaSaldo);
  $saldo=$arraySaldo[0];
  $saldoNuevo=$saldo-$total;
  if($saldoNuevo<0){
    echo 1;
  }else{
      if($comprobarinventario<0){
        echo 2;
    }else{
      $fecha=date('Y-m-d h:m:s');
      $conexion->query("insert into ventas(id_usuario,total,fecha) values($idUser,$total,'$fecha')")or die($conexion->error);
      $id_venta=$conexion->insert_id;

      for($i=0;$i<count($arreglo);$i++){
        $conexion->query("insert into productos_venta (id_venta,id_producto,cantidad,precio,subtotal)
            values(
              $id_venta,
              ".$arreglo[$i]['Id'].",
              ".$arreglo[$i]['Cantidad'].",
              ".$arreglo[$i]['Precio'].",
              ".$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']."
              )")or die($conexion->error);

            $conexion->query("update productos set inventario=inventario -".$arreglo[$i]['Cantidad']." where id=".$arreglo[$i]['Id']."")or die($conexion->error);
      }
      $conexion->query("update saldo_electronico set saldo=$saldoNuevo where id_usuario=$idUser")or die($conexion->error);
      unset($_SESSION['carrito']);
      echo 0;
    }
  }
?>
