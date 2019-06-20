<?php
$servername = "localhost";
$username = "purecore_web";
$password = "M]=&{X=r0lhA";
$dbname = "purecore_data";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[]);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
}
catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
?>