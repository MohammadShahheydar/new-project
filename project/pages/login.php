<?php
    session_start ();
    if (isset($_SESSION['permission'])) {
        if ($_SESSION['permission'] == 1) {
            header ("location: admin.php");
        } else if ($_SESSION['permission'] == 0) {
            header ("location: somewhere");
        }
    }
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
        <section class="container-fluid p-0">
            <section class="row align-items-center m-3 g-3">
                <section class="col-4 offset-4 p-2">
                    <form action="authenticate.php" method="post">
                        <section class="form-group">
                            <label for="username" class="form-label"> username :</label>
                            <input type="text" name="username" placeholder="username ..." id="username"
                                   class="form-control m-3">
                        </section>
                        <section class="form-group">
                            <label for="password" class="form-label"> password :</label>
                            <input type="password" name="password" placeholder="password ..." id="password"
                                   class="form-control m-3">
                        </section>
                        <section class="form-group">
                            <input type="submit" class="btn btn-success m-3">
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </body>
</html>
