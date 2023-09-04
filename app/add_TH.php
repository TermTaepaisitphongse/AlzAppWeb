<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

if(isset($_POST['title'])){
    require '../db_conn.php';

    $title = $_POST['title'];
    $date = date('Y-m-d',strtotime($_POST["datepicker"]."-543 years"));
    $time = $_POST["timepicker"];
    $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
    $user = $_SESSION["username"];

    if(empty($title)){
        header("Location: ../To_do_list_TH.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO ToDoListDB(title,users,date_time) VALUE(?,?,?)");
        $res = $stmt->execute([$title,$user,$datetime]);
        
        $id = $conn->lastInsertId();
        
        $stmt = $conn->prepare("INSERT INTO CalendarDB (title,users,start,TodoListID) VALUE(?,?,?,?)");
        $res = $stmt->execute([$title,$user,$datetime,$id]);

        if($res){
            header("Location: ../To_do_list_TH.php?mess=success"); 
        }else {
            header("Location: ../To_do_list_TH.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../To_do_list_TH.php?mess=error");
}