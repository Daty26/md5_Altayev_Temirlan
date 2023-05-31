<?php

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogIn($name, $pass) !== false){
        header("location: ../log-in.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $name, $pass);
}else{
    header("location: ../log-in.php");
    exit();
}