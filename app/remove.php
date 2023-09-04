<?php

if(isset($_POST['id'])){
    require '../db_conn.php';
    ob_start();
    
    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $conn->prepare("DELETE FROM ToDoListDB WHERE id=?");
        $res = $stmt->execute([$id]);
        
        $stmt = $conn->prepare("DELETE FROM CalendarDB WHERE TodoListID=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }
        $conn = null;
        
        exit();
    }
}else {
    header("Location: ../To_do_list.php?mess=error");
}