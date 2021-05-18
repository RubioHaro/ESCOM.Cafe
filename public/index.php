<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require './shared/header.php'; ?>
    <title>Document</title>
</head>

<body>
    <?php
    echo "Hello World: Loading login"
    ?>

    <?php
    header("Location: login");
    exit();
    ?>

</body>

</html>