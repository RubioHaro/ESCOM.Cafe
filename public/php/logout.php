<?php
setcookie("userEmail", '', time()+60*60*24*30, "/", NULL);
header("Location: ./../index.php");
die();
 ?>
