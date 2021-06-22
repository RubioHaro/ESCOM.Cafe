<?php
require_once('./../config.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Google</title>
  </head>
  <body>
    <button type="button" onclick="window.location = '<?= $login_url ?>'" name="button">Sign in with google</button>
  </body>
</html>
