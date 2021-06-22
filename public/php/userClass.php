<?php

class User
{
  function conexion()
  {
    $servidor="localhost";
    $nombreBD="proyectotw";
    $usuario="root";
    $pass="";
    return mysqli_connect($servidor,$usuario,$pass,$nombreBD);
  }

  function insertUser($data)
  {
    $conexion = $this->conexion();
    $checkUser = "SELECT * FROM usuario WHERE email = '".$data['email']."'";
    $check = mysqli_query($conexion, $checkUser);
    if(mysqli_num_rows($check) == 0)
    {
      $password = $this->generateCode(7);
      $query = "INSERT INTO usuario(nombre, email, password, nivel, foto) VALUES ('".$data['f_name']."', '".$data['email']."', '$password', 'Cliente',' ".$data['avatar']."')";
      $result = mysqli_query($conexion, $query);
      if($result)
      {
        setcookie("userEmail", $data['email'], time()+60*60*24*30, "/", NULL);
        header("Location: index.php");
        exit();
      }
      else
        echo "Error inserting user!";
    }
    else
    {
      setcookie("userEmail", $data['email'], time()+60*60*24*30, "/", NULL);
      $this->redirectUser($data['email']);
      exit();
    }
  }

  function generateCode($length)
  {
    $chars = "awqweyADC0983ad90";
    $code = "";
    $clean = strlen($chars) - 1;

    while(strlen($code) < $length)
    {
      $code .= $chars[mt_rand(0, $clean)];
    }

    return $code;
  }

  function redirectUser($email)
  {
    $conexion = $this->conexion();

    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $result = mysqli_query($conexion, $query);
    $userData = mysqli_fetch_array($result);
    if($userData['nivel'] == 'Admin')
      header("Location: admin/index.php");
    else
      header("Location: index.php");
  }

  function checkBalance()
  {
    $conexion = $this->conexion();
    $userId = $this->getUserId();

    $query = "SELECT * FROM saldo_electronico WHERE id_usuario = '$userId'";
    $checkBalance = mysqli_query($conexion, $query);

    if (mysqli_num_rows($checkBalance) == 0)
    {
      $query = "INSERT INTO saldo_electronico(id_usuario, saldo) VALUES ('$userId', '0')";
      $newBalance = mysqli_query($conexion, $query);
      if ($newBalance)
        return 0;
      else
        return -1;
    }
    else
    {
      $userBalance = mysqli_fetch_array($checkBalance);
      return $userBalance['saldo'];
    }
  }

  function printData()
  {
    $conexion = $this->conexion();

    $query = "SELECT * FROM usuario WHERE email = '".$_COOKIE['userEmail']."'";
    $result = mysqli_query($conexion, $query);

    $userData = mysqli_fetch_array($result);
    $content = '
      <table>
        <thead>
          <tr>
          <th>Name</th>
          <th>Avatar</th>
          <th>Email</th>
          </tr>
        </thead>
        <tbody>
    ';
    $content .= '
      <tr>
        <td>'.$userData["nombre"].'</td>
        <td><img style="max-width: 50px;" src="'.$userData["foto"].'"></td>
        <td>'.$userData["email"].'</td>
      </tr>
      </tbody>
      </table>
    ';

    return $content;
  }

  function requestBalance($amount)
  {
    $conexion = $this->conexion();
    $userId = $this->getUserId();

    $query = "INSERT INTO peticiones_saldo(id_usuario, saldo_req, estado) VALUES ('$userId', '$amount', '0')";
    $req = mysqli_query($conexion, $query);

    if ($req)
    {
      $_SESSION['balance_message'] = "Solicitud de $".$amount." exitosa.";
    }
    else
    {
      $_SESSION['balance_message'] = "No se pudo realizar la petición.";
    }
  }

  function getUserId()
  {
    $conexion = $this->conexion();

    $query = "SELECT * FROM usuario WHERE email = '".$_COOKIE['userEmail']."'";
    $result = mysqli_query($conexion, $query);
    $userData = mysqli_fetch_array($result);

    return $userData['id'];
  }
}
?>
