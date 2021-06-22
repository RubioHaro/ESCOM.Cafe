<?php
require_once('../php/adminClass.php');

$Admin = new Admin;
if (($id = $_GET['id']) != null)
{
  $Admin->acceptBalanceRequest($id);
}

header("Location: solicitudesSaldo.php");
?>
