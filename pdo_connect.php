<?php

$host = 'localhost:3307';
$dbname = 'login';
$username = 'root';
$password = 'hehez190';

try {

  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);


  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connected successfully";
  echo "<br>";

} catch (PDOException $e) {
  die("Connection Failed: " . $e->getMessage());
}
?>
