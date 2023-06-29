<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $post['title'] ?></title>
</head>
<body class="container p-5 d-grid justify-content-center">
    <h1 class="text-center"><?php echo $post['title'] ?></h1>
    <div class="mt-5">
        <form action="/update/" class="d-grid gap-4" method="post">
            <input type="hidden" name="post_id"  value="<?php echo $post['id'] ?>">
            <div class="d-grid gap-2">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Название" value="<?php echo $post['title']?>">
            </div>
            <div class="d-grid gap-2">
                <label for="">Автор</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Автор" value="<?php echo $post['author']?>">
            </div>
            <div class="d-grid gap-2">
                <label for="date">Дата</label>
                <input type="date" name="updated_at" id="date" class="form-control" placeholder="Дата" value="<?php echo date('Y-m-d',strtotime($post['updated_at']))?>">
            </div>
            <div class="d-flex">
                <input type="submit" class="btn btn-primary" value="Обновить">
            </div>
        </form>
            <form action="/delete" method="post" class="d-flex justify-content-between gap-5 mt-5">
                <input type="hidden" name="post_id" value="<?php echo $post['id'] ?>">
                <div class="d-flex gap-3">
                    <input class="btn btn-danger" type="submit" value="Удалить">
                </div>
                <a href="/posts/" class="btn btn-warning"> Все посты</a>
            </form>
        <div>
            <?php

            if (isset($_SESSION['message'])) {
                $message = $_SESSION['message'];
                echo "<p class='text-success mt-3 text-center'>$message</p>";
                unset($_SESSION['message']);
            }
            ?>
        </div>
    </div>
</body>
</html>