<?php
include '../env.php';
$conn = mysqli_connect("localhost",$DB_USERNAME,$DB_PASSWORD,$DB_NAME) ;

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>