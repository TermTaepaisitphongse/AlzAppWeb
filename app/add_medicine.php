<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

require '../db_conn.php';

#$title = $_POST['title'];
$title = 'Take Medicine';
$user = $_SESSION["username"];

if(empty($title)){
    header("Location: ../To_do_list.php?mess=error");
}else {
    $stmt = $conn->prepare("INSERT INTO ToDoListDB (title,users,date_time) VALUE(?,?,?)");
    $res = $stmt->execute([$title,$user,date('d-M-y H:i')]);
    
    $id = $conn->lastInsertId();
        
    $stmt = $conn->prepare("INSERT INTO CalendarDB (title,users,start,TodoListID) VALUE(?,?,?,?)");
    $res = $stmt->execute([$title,$user,date('d-M-y H:i'),$id]);

    if($res){
        header("Location: ../To_do_list.php?mess=success"); 
    }else {
        header("Location: ../To_do_list.php");
    }
    $conn = null;
    exit();
}
