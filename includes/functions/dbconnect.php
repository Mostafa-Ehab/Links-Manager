<?php

$dsn = "mysql: host=localhost; dbname=links manager";
$user = "root";
$pass = "";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
);

try{
    $conn = new PDO($dsn, $user, $pass, $options);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "Failed database connection: " . $e->getMessage();

}

?>