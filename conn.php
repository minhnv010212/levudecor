<?php
$servername = "localhost";
$username = "root";
$password = "";
// $username = "tbigshop_decor";
// $password = "!@#SONbang123";

try {
  $conn = new PDO("mysql:host=$servername;dbname=design_levu;charset=utf8", $username, $password);
  $conn->exec("set names utf8");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>