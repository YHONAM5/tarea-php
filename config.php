<?php
    $host = "localhost";
    $dbname = "vestasdemo_db";
    $username = "root";
    $password = "";
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch(PDOException $e) {
        die("Error conexion fallida: " . $e->getMessage());
    }
?>