<?php

$servername = "levudecor-db-designlevu.k.aivencloud.com";
$port = "27885";
$dbname = "defaultdb";

$username = "avnadmin";
$password = "AVNS_kjgqFTzs9TwJOqwc2xL";

try {

    $conn = new PDO(
        "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $conn->exec("set names utf8");

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e) {

    die("Connection failed: " . $e->getMessage());

}

?>
