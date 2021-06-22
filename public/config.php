<?php
  require_once('./vendor/autoload.php');
  $gClient = new Google_Client();
  $gClient->setClientId("740004942034-uus3lk6tknhlbl0243v82mrmkqkd46n1.apps.googleusercontent.com");
  $gClient->setClientSecret("MQHFjdwEgGJMU2k4N2R0r6IW");
  $gClient->setApplicationName("Login Test");
  $gClient->setRedirectUri("http://localhost/ProyectoTW/Controller.php");
  $gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

  $login_url = $gClient->createAuthUrl();
?>
