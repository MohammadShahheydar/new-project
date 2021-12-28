<?php
    $connection = getConnection ();
    function getConnection () {
        $connection = mysqli_connect ("localhost", 'root', 'Mohamm@d', 'laitec-practice-5') or die ('can not connect to db' . mysqli_error ($connection));
        return $connection;
    }
    
    function getSlider ($column = "*", $condition = "", $con = null) {
        $con = $con ?? $GLOBALS['connection'];
        $query = ($condition !== "") ? "select $column from slider where $condition" : "select $column from slider";
        return mysqli_query ($con, $query);
    }
    
    function insert ($image, $caption, $alt, $link, $publish = 0) {
        $query = "insert into slider (image , caption , image_alt , link , publish) values ('$image','$caption','$alt' , '$link' , '$publish')";
        return mysqli_query (getConnection (), $query);
    }
    
    function uploadImage ($image, $path = "") {
        $upload = true;
        $image_name = time () . $image['name'];
        $file_type = pathinfo ($image['name'], PATHINFO_EXTENSION);
        if (!($file_type === 'jpg' || $file_type === 'jpeg' || $file_type === 'png')) {
            $upload = false;
        }
        if ($image['size'] > 500000000000) {
            $upload = false;
        }
        $directory = "../image/";
        for ($i = 0, $iMax = count (explode ("/", $path)); $i < $iMax; $i ++) {
            $directory .= explode ("/", $path)[$i];
            if (!file_exists ($directory)) {
                mkdir ($directory);
            }
            $directory .= "/";
        }
        $directory .= $image_name;
        if ($upload) {
            if (move_uploaded_file ($image['tmp_name'], $directory)) {
                return $image_name;
            } else {
                return false;
            }
        }
    }
    
    function delete ($condition, $name, $con = null): bool {
        if (empty ($condition)) {
            throw new IllegalArgumentException();
        }
        $con = $con ?? $GLOBALS['connection'];
        $query = "delete from slider where $condition";
        if (mysqli_query ($con, $query) && file_exists ("../image/$name")) {
            return unlink ("../image/$name");
        } else {
            return false;
        }
    }
    
    function update ($id , $caption, $alt, $link, $publish , $lastImage , $image = null) {
        $con = getConnection();
        $query = "";
        
        if(isset($image) && file_exists("../image/".$lastImage)) {
            unlink("../image/".$lastImage);
            $img_name = uploadImage ($image);
            $query = "update slider set image = '$img_name' , caption = '$caption' , link = '$link' , image_alt = '$alt' , publish = '$publish' where id = '$id' ";
            var_dump($query);
        } else {
            $query = "update slider set caption = '$caption' , link = '$link' , image_alt = '$alt', publish = '$publish' where id = '$id' ";
        }
        
        
        return mysqli_query($con , $query) or die (mysqli_error($con));
    }

?>
