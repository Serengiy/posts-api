<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новый пост</title>
</head>
<body class="container p-5">
    <h1 class="text-center">Новый пост</h1>
    <div class="mt-5 d-flex justify-content-center">
        <form action="/store/" class="d-grid w-50 gap-4" method="post">
            <div class="d-grid gap-2">
                <label for="title">Название</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Название">
            </div>
            <div class="d-grid gap-2">
                <label for="">Автор</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Автор">
            </div>
            <div class="d-flex justify-content-between">
                <input type="submit" class="btn btn-primary" value="Создать">
                <a href="posts/" class="btn btn-warning"> Все посты</a>
            </div>
        </form>
    </div>
    <div class="mt-5 d-flex justify-content-center">
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            echo "<p class='text-danger'>$message</p>";
            unset($_SESSION['message']);
        }
        ?>
    </div>
    <div>
    </div>
</body>
</html>