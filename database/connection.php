<?php
include("./../classes/Database.php");

function connection()
{
    $db_instance = new Database();
    try {
        $conn = new PDO("mysql:host=" . $db_instance->getHostname() . ";dbname=" . $db_instance->getName(), $db_instance->getUsername(), env('DB_PASSWORD'));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
connection();
