<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == "admin" and $password == "admin") {
        $_SESSION['permission'] = 1;
        header("location:home.php");
    } else {
        header("location:home.php");
    }