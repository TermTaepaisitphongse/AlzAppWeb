<?php
require_once "db.php";
$title = $_GET['title'];
$start = $_GET['start'];
$end = $_GET['end'];

$sqlInsert = "INSERT INTO CalendarDB (title,start,end) VALUES ('".$title."','".$start."','".$end ."')";

$result = mysqli_query($conn, $sqlInsert);

if (!$result) {
    $result = mysqli_error($conn);
}else{
    header("location: https://alzappweb.000webhostapp.com/calendar/index_TH.php" );
}
?>