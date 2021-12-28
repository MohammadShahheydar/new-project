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
        <section class="container-fluid pt-5">
            <section class="row m-0">
                <section class="col-6 offset-3">
                    <a href="manage.php" class="btn btn-primary">Management</a>
                    <a href="home.php" class="btn btn-primary">Home</a>
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                        <section class="form-group mt-3">
                            <label for="captions">Captions :</label>
                            <input class="form-control" type="text" name="caption" id="captions" placeholder="caption for image">
                        </section>
                        <section class="form-group mt-3">
                            <label for="link">link :</label>
                            <input class="form-control" type="text" name="link" id="link" placeholder="link for image">
                        </section>
                        <section id="file-container" class="form-group mt-3 row justify-content-between">
                            <section class="col-10">
                                <label for="image">image :</label>
                                <input class="form-control" id="file" type="file" name="image" id="image" placeholder="image for image">
                            </section>
                            <section style="display: none" id="img-container" class="col-2 row justify-content-center">
                                <img id="img" class="d-block img-fluid img-responsive img-thumbnail" style="width: 100px; height: 100px;">
                            </section>
                        </section>
                        <section class="form-group mt-3">
                            <label for="publish">publish :</label>
                            <select name="publish" id="publish" class="form-control">
                                <option value="1">publish</option>
                                <option value="0">not publish</option>
                            </select>
                        </section>
                        <section class="form-group mt-3">
                            <input type="submit" value="submit" id="submit" class="btn btn-success">
                        </section>
                    </form>
                </section>
            </section>
        </section>
        <script src="showImage.js"></script>
    </body>
</html>