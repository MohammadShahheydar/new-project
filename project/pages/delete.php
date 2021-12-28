<?php
    include_once 'config.php';
    session_start();
    $id = $_POST['id'];
    $image = $_POST['image'];
    echo $image;
    $isDelete = delete("id = $id" , $image);
    $_SESSION['deleted'] = $isDelete ?? null;
    header("location:manage.php");
