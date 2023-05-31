<?php
function dump($variables){
    echo "<pre>";
        var_dump($variables);
    echo "</pre>";
}
function emptyInputSignUp($name, $email, $pass, $passRepeat){
    $result;
    if(empty($name) || empty($email) || empty($pass) || empty($passRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidName($name){
    $result;
    if(!preg_match('/^[a-zA-Z0-9]*$/', $name)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function passCheck($pass, $passRepeat){
    $result;
    if(!($pass == $passRepeat)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function checkUsername($conn, $name, $email){
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email, $pass){
    $sql = "INSERT INTO users (usersName, usersEmail, usersPass) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); 

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign-up.php?error=stmtfailed");
        exit();
    }

    $hiddenPass = password_hash($pass, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hiddenPass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../sign-up.php?error=none");
    exit();
}
function emptyInputLogIn($name, $pass){
    $result;
    if(empty($name) || empty($pass)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}
function loginUser($conn, $name, $pass){
    $nameExists = checkUsername($conn, $name, $name);

    if($nameExists === false){
        header("location: ../log-in.php?error=incoorectlogin");
        exit();
    }
    echo '<pre>' , var_dump($nameExists) , '</pre>';

    $hiddenPass = $nameExists['usersPass'];
    $check = password_verify($pass, $hiddenPass);
    if($check === false){
        header("location: ../log-in.php?error=wrongpass");
        exit();
    }else if($check === true){
        session_start();
        $_SESSION["usersid"] = $nameExists['usersId'];
        $_SESSION["usersname"] = $nameExists['usersName'];
        header("location: ../../index.php");
        exit();
    }
}
function emptyContent($title, $content){
    return (empty($title) && empty($content));
}
function escapeStr($string){
    global $conn;
    
    return mysqli_real_escape_string($conn, $string);
}