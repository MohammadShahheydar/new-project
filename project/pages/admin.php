<?php
    session_start ();
    if (!(isset($_SESSION['permission']) and $_SESSION['permission'] == 1)) {
        header ("location: login.php");
    }
    
    include_once 'config.php';
    $pullGit = "just for test";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
        <main>
            <section class="container-fluid p-0">
                <section class="row m-0 p-0">
                
                </section>
            </section>
        </main>
        
        <?php
            session_destroy();
        ?>
    </body>
</html>
