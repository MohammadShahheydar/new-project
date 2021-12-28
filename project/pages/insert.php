<?php
    include_once 'config.php';
    $caption = $_POST['caption'];
    $link = $_POST['link'];
    $image = $_FILES['image'];
    $publish = $_POST['publish'];
    
    $image_name = uploadImage($image);
    var_dump($image_name);
    if($image_name) {
        insert($image_name, $caption, "slider background", $link,$publish);
    }
    
    header("location: insertPage.php");
    
