<?php
session_start();
require_once('./userClass.php');

$User = new User;
if (($amount = $_POST['solicitar']) != null)
{
  $User->requestBalance($_POST['amount']);
}

header("Location: userIndex.php");
?>
