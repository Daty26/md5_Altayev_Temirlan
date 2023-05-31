<?php
    if(!isset($_SESSION)){
        session_start();
    }
    require 'inc/db.inc.php';
    if(isset($_GET['noteid'])){
        $id = $_GET['noteid'];
        $sql = "SELECT * FROM notes WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        }
    }
    require 'inc/functions.inc.php';
    
    if(isset($_POST['submit'])){
        
        $title = escapeStr(trim($_POST['title']));
        $content = escapeStr($_POST['content']);
        $color = $_POST['color'];
    
        $user_id = $_SESSION['usersid'];
    
        if(isset($_GET['noteid'])){
            $noteid = $_GET['noteid'];
    
            if($title === '' && $content === '' ){
                header("location: ../main.php");
                exit();
            }elseif(emptyContent($title, $content)){
                header("location: text-editor.php?error=emptyinput");
                exit();
            }else if($title === '' && !empty($content)){
                $updateSql = "UPDATE notes SET content = '$content', color = '$color' WHERE id = '$noteid' AND user_id = '$user_id'";
            }elseif($content === '' && !empty($title)){
                $updateSql = "UPDATE notes SET title = '$title', color = '$color' WHERE id = '$noteid' AND user_id = '$user_id'";
            }else{
                $updateSql = "UPDATE notes SET title = '$title', content = '$content', color = '$color' WHERE id = '$noteid' AND user_id = '$user_id'";
            }
            if(mysqli_query($conn, $updateSql)){
                header("location: ../main.php");
                exit();
                echo "Заметка успешно обновлена";
            }else{
                echo "Ошибка обновления заметки: ".mysqli_error($conn);
            }
        }else{
            if(emptyContent($title, $content)){
                header("location: text-editor.php?color=".trim(urlencode($color))."&error=emptyinput");
                exit();
            }
            $sql = "INSERT INTO notes (title, content, user_id, color) VALUES ('$title', '$content', '$user_id', '$color')";
            if(mysqli_query($conn, $sql)){
                header("location: ../main.php");
                exit();
                echo "Новая заметка успешно создана";
            }else{
                echo "Ошибка создания новой заметки: ".mysqli_error($conn);
            }
        }
    }
    
    
    