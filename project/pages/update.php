<?php
    include_once 'config.php';
    session_start ();
    $caption = $_POST['caption'];
    $link = $_POST['link'];
    $image = $_FILES['image'];
    $lastImage = $_POST['lastImage'];
    $publish = $_POST['publish'];
    $alt = $_POST['alt'];
    $id = $_POST['id'];
    if (isset($caption) and !empty($caption) and isset($link) and !empty($link) and isset($publish) and !empty($publish)) {
        $result = (isset($image['name'])) ? update ($id, $caption, $alt, $link, $publish, $lastImage, $image)
            : update ($id, $caption, $alt, $link, $publish, $lastImage);
    } else {
        $_SESSION['error'] = "You must fill in all the fields";
    }
    //header("location:manage.php");
