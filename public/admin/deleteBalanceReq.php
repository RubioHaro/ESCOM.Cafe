<?php
if (($id = $_GET['id']) != null)
{
  $server = "localhost";
  $db = "proyectotw";
  $user = "root";
  $password = "";

  $conn = mysqli_connect($server,$user,$password,$db);

  $query = "DELETE FROM peticiones_saldo WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
}

header("Location: solicitudesSaldo.php");
?>
