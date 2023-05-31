<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $passRepeat = $_POST["passrepeat"];

    require_once "db.inc.php";
    require_once "functions.inc.php";

    if(emptyInputSignUp($name, $email, $pass, $passRepeat) !== false){
        header("location: ../sign-up.php?error=emptyinput");
        exit();
    }
    if(invalidName($name) !== false){
        header("location: ../sign-up.php?error=invalidname");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../sign-up.php?error=emailistyppenwrong");
        exit();
    }
    if(passCheck($pass, $passRepeat) !== false){
        header("location: ../sign-up.php?error=passwordsarenotthesame");
        exit();
    }
    if(checkUsername($conn, $name, $email) !== false){
        header("location: ../sign-up.php?error=namealreadyexists");
        exit();
    }

    createUser($conn, $name, $email, $pass);

}else{
    header("location: ../sign-up.php");
    exit();
}