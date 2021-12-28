<?php
    include_once 'config.php';
    session_start();
    $result = getSlider("id , image , caption , image_alt as alt , link , publish");
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
        <style>
            table > tbody > tr > td {
                width: 100px;
                height: 100px;
                vertical-align: middle;
                text-align: center;
            }

            table > thead > tr > th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        
        <section class="container-fluid">
            <?php if(isset($_SESSION['deleted'])): ?>
            <section class="row m-3 g-3">
                <section class="col-6 offset-3">
                    <section class="alert alert-danger text-center">
                        <h3>عکس با موفقیت حذف شد</h3>
                    </section>
                </section>
            </section>
            <?php endif; ?>
            <section class="row m-3 g-3">
                <section class="col-6 offset-3">
                    <table class="table table-dark table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>caption</th>
                                <th>alt</th>
                                <th>link</th>
                                <th>publish</th>
                                <th colspan="2">command</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $item) : ?>
                                <tr>
                                    <td><img class="img-fluid" src="../image/<?php echo $item['image'] ?>" alt="<?php echo $item['alt'] ?>"></td>
                                    <td><?php echo $item['caption'] ?></td>
                                    <td><?php echo $item['alt'] ?></td>
                                    <td><?php echo $item['link'] ?></td>
                                    <td>
                                        <?php if((int)$item['publish'] === 1): ?>
                                            <span class="badge bg-success">فعال</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">غیر فعال</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $item['id']?>">
                                            <input type="hidden" name="image" value="<?php echo $item['image']?>">
                                            <input type="submit" value="delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="updatePage.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $item['id']?>">
                                            <input type="hidden" name="image" value="<?php echo $item['image']?>">
                                            <input type="hidden" name="alt" value="<?php echo $item['alt']?>">
                                            <input type="hidden" name="link" value="<?php echo $item['link']?>">
                                            <input type="hidden" name="caption" value="<?php echo $item['caption']?>">
                                            <input type="hidden" name="publish" value="<?php echo $item['publish']?>">
                                            <input type="submit" value="update" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </section>
            <section class="row m-3 g-3">
                <section class="col-2 offset-5">
                    <a href="insert.php" class="d-block btn btn-primary">insert image</a>
                </section>
            </section>
        </section>
        <?php
            $_SESSION['deleted'] = null;
        ?>
    </body>
</html>
