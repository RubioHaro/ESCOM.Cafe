<?php
session_start();
include "./validateClient.php";
require_once('./php/userClass.php');
$User = new User;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
<?php include("./layouts/header.php"); ?>

    <?php echo $User->printData(); ?>

    <?php
      if (isset($_SESSION['balance_message']))
      {
        echo $_SESSION['balance_message'];
        unset($_SESSION['balance_message']);
      }
    ?>

    <h1>Tu saldo es: <?php echo $User->checkBalance(); ?></h1>
    <form action="requestBalance.php" method="POST">
      <input type="number" name="amount" min="10" max="999" required>
      <input type="submit" name="solicitar" value="solicitar saldo">
    </form>

    <?php
    if (isset($_SESSION['orderData']))
    {
      echo $_SESSION['orderData'];
      unset($_SESSION['orderData']);
    }
    ?>

    <h3>Mis compras</h3>
    <table>
    <thead>
      <tr>
        <th>Número de pedido</th>
        <th>Total</th>
        <th>Fecha</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $server = "localhost";
    $db = "proyectotw";
    $user = "root";
    $password = "Fernando:2";
    $id = $User->getUserId();

    $conn =  mysqli_connect($server,$user,$password,$db);
    $query = "SELECT * FROM ventas WHERE id_usuario = '$id'";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result)){
    ?>

    <tr>
      <td> <?= $row['id'] ?> </td>
      <td> <?= $row['total'] ?> </td>
      <td> <?= $row['fecha'] ?> </td>
      <td>
        <a href="getOrderData.php?id=<?= $row['id'] ?>">
          Ver detalles
        </a>
      </td>
    </tr>

    <?php } ?>
    </tbody>
    </table>
<?php include("./layouts/footer.php"); ?>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>
</html>
