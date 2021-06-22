<?php
$servidor="localhost";
$nombreBD="proyectotw";
$usuario="root";
$pass="";
$conexion=mysqli_connect($servidor,$usuario,$pass,$nombreBD);

$query = "SELECT nivel FROM usuario WHERE email = '".$_COOKIE['userEmail']."'";
$result = mysqli_query($conexion, $query);
$userData = mysqli_fetch_array($result);
if($userData['nivel'] == 'Admin')
  header("Location: ../admin/index.php");
else
  header("Location: ../index.php");
?>
