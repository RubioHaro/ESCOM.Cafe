<?php
session_start();
if (($id = $_GET['id']) != null)
{
  $server = "localhost";
  $db = "proyectotw";
  $user = "root";
  $password = "";

  $conn = mysqli_connect($server,$user,$password,$db);

  $query = "SELECT productos.nombre, productos_venta.cantidad, productos_venta.precio, productos_venta.subtotal
  FROM productos_venta
  INNER JOIN productos ON productos_venta.id_producto = productos.id
  WHERE productos_venta.id_venta = '$id'";
  $result = mysqli_query($conn, $query);
  $content = '
    <table>
      <thead>
        <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = mysqli_fetch_array($result))
  {
    $content .= '
      <tr>
        <td>'.$row["nombre"].'</td>
        <td>'.$row["precio"].'</td>
        <td>'.$row["cantidad"].'</td>
        <td>'.$row["subtotal"].'</td>
      </tr>
    ';
  }
  $content .= '
  </tbody>
  </table>';

  $_SESSION['orderData'] = $content;
}

header("Location: userIndex.php");
?>
