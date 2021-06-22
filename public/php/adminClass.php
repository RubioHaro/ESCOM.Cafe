<?php
class Admin
{
  function conn()
  {
    $server = "localhost";
    $db = "proyectotw";
    $user = "root";
    $password = "";

    return mysqli_connect($server,$user,$password,$db);
  }

  function acceptBalanceRequest($idReq)
  {
    $conn = $this->conn();

    $getReqQuery = "SELECT * FROM peticiones_saldo where id = '$idReq'";
    $getReq = mysqli_query($conn, $getReqQuery);
    $reqData = mysqli_fetch_array($getReq);

    $idUser = $reqData['id_usuario'];
    $amount = $reqData['saldo_req'];

    $disableReqQuery = "UPDATE peticiones_saldo SET estado = '1' WHERE  id = '$idReq'";
    $disableReq = mysqli_query($conn, $disableReqQuery);

    $insertBalanceQuery = "UPDATE saldo_electronico SET saldo_electronico.saldo = saldo_electronico.saldo + '$amount' WHERE id_usuario = '$idUser'";
    $insertBalance = mysqli_query($conn, $insertBalanceQuery);

    if ($insertBalance)
    {
      echo "siuuuu";
    }
    else
    {
      echo "noouuuu";
    }
  }
}

?>
