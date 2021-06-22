<?php
require_once('./../config.php');
require_once('./userClass.php');

if(isset($_GET['code']))
{
  $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
}
else
{
  header("Location: index.php");
  exit();
}

if(isset($token['error']) != "invalid_grant")
{
  $oAuth = new Google_Service_Oauth2($gClient);
  $userData = $oAuth->userinfo_v2_me->get();

  $User = new User();

  echo $User->insertUser(array(
    'email'=>$userData['email'],
    'avatar'=>$userData['picture'],
    'f_name'=>$userData['givenName']//,
    //'l_name'=>$userData['familyName']
  ));

  // echo "<pre>";
  // var_dump($token);
  // echo "</pre>";
}
else
{
  header("Location: index.php");
  exit();
}
?>
