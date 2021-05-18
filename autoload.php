<?php
$message = "";
if (file_exists('./../env.php')) {
    include './../env.php';
} else {
    $message = "No se ha encontrado el archivo .env";
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        // echo "<script>
        //         console.log('buscando variable:" . $key . "');
        //     </script>";
        $value = getenv($key);

        if ($value === false) {
            return $default;
        }

        return $value;
    }
    // echo "<script>
    //         console.log('la función env se ha creado');
    //     </script>";
} else {
    // echo "<script>
    //         console.log('la función env ya existe');
    //     </script>";
}
?>
<script>
    console.log("<?= $message ?>");
</script>