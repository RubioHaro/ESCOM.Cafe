<?php
$servidor="localhost";
$nombreBD="proyectotw";
$usuario="root";
$pass="Fernando:2";

$conn=mysqli_connect($servidor,$usuario,$pass,$nombreBD);
$query = "SELECT * FROM usuario WHERE email = '".$_COOKIE['userEmail']."' AND nivel = 'Cliente'";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 0)
  header("Location: index.php");
?>
