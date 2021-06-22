<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reporte diario</title>
  </head>
  <body>
    <?php
    date_default_timezone_set('America/Mexico_City');
    //$timestamp = strtotime($string);
    //echo date("Y-m-d H:i:s", $timestamp);GMT-5
    $date = date("Y-m-d", time());
    $formattedDate = date('d / m / Y');

    $server = "localhost";
    $db = "proyectotw";
    $user = "root";
    $password = "";
    $conn = mysqli_connect($server,$user,$password,$db);
    ?>

    <h2>Reporte diario del <?php echo $formattedDate; ?></h2>

    <h3>Por total de las órdenes de usuario pedidas:</h3>
    <table>
      <thead>
        <tr>
          <th>Id orden</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Total compra</th>
          <th>Fecha</th>
        </tr>
      </thead>
      <tbody>

    <?php
    $query = "SELECT ventas.id, ventas.total, ventas.fecha, usuario.nombre, usuario.email  FROM ventas INNER JOIN usuario ON ventas.id_usuario = usuario.id WHERE ventas.fecha >= '$date 00:00:00'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "Hoy no hubo ventas u ocurrió un problema";
    }
    else {
      while($row = mysqli_fetch_array($result)){
    ?>

    <tr>
      <td> <?= $row['id'] ?> </td>
      <td> <?= $row['nombre'] ?> </td>
      <td> <?= $row['email'] ?> </td>
      <td> <?= $row['total'] ?> </td>
      <td> <?= $row['fecha'] ?> </td>
    </tr>

    <?php
    }}
    $query = "SELECT SUM(total) AS sumaVentas FROM ventas WHERE ventas.fecha >= '$date 00:00:00'";
    $result = mysqli_query($conn, $query);
    $total = mysqli_fetch_array($result)
    ?>
        <td>  </td>
        <td>  </td>
        <td> </td>
        <td> Total: <?= $total['sumaVentas'] ?> </td>
        <td>  </td>
      </tbody>
    </table>

    <h3>Por productos de de cada orden pedidas:</h3>
    <table>
      <thead>
        <tr>
          <th>Id orden</th>
          <th>Nombre Producto</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $query = "SELECT ventas.id, productos.nombre, productos_venta.cantidad
              FROM productos_venta
              INNER JOIN ventas ON productos_venta.id_venta = ventas.id
              INNER JOIN productos ON productos_venta.id_producto = productos.id
              WHERE ventas.fecha >= '$date 00:00:00'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "Hoy no hubo ventas u ocurrió un problema";
    }
    else {
      $idTemp = "";
      while($row = mysqli_fetch_array($result)){
    ?>

      <tr>
        <td>
          <?php
          if($idTemp != $row['id'] )
          {
            $idTemp = $row['id'];
            echo $idTemp;
          }
          ?>
        </td>
        <td> <?= $row['nombre'] ?> </td>
        <td> <?= $row['cantidad'] ?> </td>
      </tr>

    <?php }} ?>
      </tbody>
    </table>
    <h3>Total por productos:</h3>
    <table>
      <thead>
        <tr>
          <th>Nombre Producto</th>
          <th>Precio Producto</th>
          <th>Cantidad vendida en el día</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $query = "SELECT productos.nombre, productos.precio, SUM(productos_venta.cantidad) AS quantity, SUM(productos_venta.subtotal) AS total
                  FROM productos_venta
                  INNER JOIN ventas ON productos_venta.id_venta = ventas.id
                  INNER JOIN productos ON productos_venta.id_producto = productos.id
                  WHERE ventas.fecha >= '$date 00:00:00'
                  GROUP BY productos_venta.id_producto";
        $result = mysqli_query($conn, $query);
        if (!$result) {
          echo "Hoy no hubo ventas u ocurrió un problema";
        }
        else {
          $idTemp = "";
          while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
          <td> <?= $row['nombre'] ?></td>
          <td> <?= $row['precio'] ?></td>
          <td> <?= $row['quantity'] ?> </td>
          <td> <?= $row['total'] ?> </td>
        </tr>

      <?php }} ?>
        </tbody>
      </table>
  </body>
</html>
