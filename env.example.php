
<?php
$variables = [
    'APP_KEY' => '937a4a8c1_KEY_8effdd479cad2f',
    'DB_HOST' => 'localhost',
    'DB_USERNAME' => 'X_USER_X',
    'DB_PASSWORD' => 'X_PASSWORD_X',
    'DB_NAME' => 'X_USER_X',
    'DB_PORT' => 'X_PORT_X',
];

foreach ($variables as $key => $value) {
    putenv("$key=$value");
}
?>