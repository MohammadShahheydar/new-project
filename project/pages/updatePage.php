<?php
    include_once 'config.php';
    $id = $_POST['id'];
    $image = $_POST['image'];
    $caption = $_POST['caption'];
    $alt = $_POST['alt'];
    $link = $_POST['link'];
    $publish = $_POST['publish'];
    session_start();
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
        <section class="container-fluid pt-5">
            <?php if(isset($_SESSION['error'])): ?>
            <section class="row m-3 g-3">
                <section class="alert alert-warning col-4 offset-4 text-center">
                    <h4><?php echo $_SESSION['error'] ?></h4>
                </section>
            </section>
            <?php endif; ?>
            <section class="row m-0">
                <section class="col-6 offset-3">
                    <a href="manage.php" class="btn btn-primary">Management</a>
                    <a href="home.php" class="btn btn-primary">Home</a>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <section class="form-group mt-3">
                            <label for="captions">Captions :</label>
                            <input class="form-control" type="text" name="caption" id="captions" value="<?php echo $caption; ?>" placeholder="caption for image" required>
                        </section>
                        <section class="form-group mt-3">
                            <label for="link">link :</label>
                            <input class="form-control" type="text" name="link" id="link" value="<?php echo $link ?>" placeholder="link for image " required>
                        </section>
                        <section class="form-group mt-3">
                            <label for="link">Alt :</label>
                            <input class="form-control" type="text" name="alt" id="alt" value="<?php echo $alt ?>" placeholder="Alt for image " required>
                        </section>
                        <section id="file-container" class="form-group mt-3 row justify-content-between">
                            <section class="col-10">
                                <label for="image">image :</label>
                                <input class="form-control" id="file" type="file" name="image" id="image" placeholder="image for image">
                                <input type="hidden" name="lastImage" value="<?php echo $image?>">
                            </section>
                            <section style="display: block" id="img-container" class="col-2 row justify-content-center">
                                <img id="img" src="../image/<?php echo $image ?>" class="d-block img-fluid img-responsive img-thumbnail" style="width: 100px; height: 100px;" src="../image/1640698294cat.jpg">
                            </section>
                        </section>
                        <section class="form-group mt-3">
                            <label for="publish">publish :</label>
                            <select name="publish" id="publish" class="form-control">
                                <?php if($publish==="1"): ?>
                                <option value="1" <?php echo "selected" ?>>publish</option>
                                <?php else:  ?>
                                <option value="0" <?php echo "selected" ?>>not publish</option>
                                <?php endif ?>
                            </select>
                        </section>
                        <section class="form-group mt-3">
                            <input type="hidden" name="id" value="<?php echo $id?>">
                        </section>
                        <section class="form-group mt-3">
                            <input type="submit" value="submit" id="submit" class="btn btn-success">
                        </section>
                    </form>
                </section>
            </section>
        </section>
        <script src="showImage.js"></script>
        
        <?php unset($_SESSION['error']) ?>
    </body>
</html>