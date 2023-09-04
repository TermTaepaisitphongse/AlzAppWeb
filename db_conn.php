<?php 
include 'env.php';

$sName = "localhost";
$uName = $DB_USERNAME;
$pass = $DB_PASSWORD;
$db_name = $DB_NAME;

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}