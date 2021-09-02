<?php
    $server = 'localhost';//nombre de la base de datos
    $username = 'root'; // Nombe del usuario de la base de datos
    $password = ''; //contraseña de la base de datos
    $database= 'php_login_database';//Nombre de la base de datos

    try {
        $conn = new PDO("mysql:hosto=$server;dbname=$database;", $username,$password);#conexion a BD

    } catch (PDOException $e) {
        die('Connected Failed: '.$e->getMessage());
    }
?>