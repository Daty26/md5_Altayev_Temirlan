<?php
    session_start();
    require "inc/db.inc.php";
    if (isset($_GET['noteid'])) {
        $noteid = $_GET['noteid'];
        $user_id = $_SESSION['usersid'];
    
        $sql = "DELETE FROM notes WHERE id = '$noteid' AND user_id = '$user_id'";
        if ($conn->query($sql) === TRUE) {
            header("location: ../main.php");
            exit();
        } else {
            echo "Ошибка удаления заметки: " . $conn->error;
        }
    } else {
        header("location: ../main.php");
        exit();
    }