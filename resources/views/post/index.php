<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Все посты</title>
</head>
<body class="container p-5">
    <h1 class="text-center">Все посты</h1>
    <div>
        <a href="/create" class="btn btn-primary">Новый пост</a>
    </div>
    <div>
        <form action="/posts" class="mt-5 d-flex justify-content-between">
            <div>
                <input type="text" class="form-control" name="title" placeholder="Наззвание">
            </div>
            <div>
                <input type="text" class="form-control" name="author" placeholder="Имя Автора">
            </div>
            <div>
                <input type="date" class="form-control" name="date_from" placeholder="С конкрутной даты">
            </div>
            <div>
                <input type="date" class="form-control" name="date_to" placeholder="С конкрутной даты">
            </div>
            <div>
                <input type="submit" value="Поиск" class="btn btn-primary" placeholder="С конкрутной даты">
            </div>
        </form>
    </div>
    <div class="mt-5 text-center">
        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            echo "<h4 class='text-success'>$message</h4>";
            unset($_SESSION['message']);
        }

        ?>
    </div>
    <table class="table mt-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Имя Автора</th>
            <th scope="col">Дата публикации</th>
            <th scope="col">Удаление</th>
        </tr>
        </thead>
        <tbody class="mt-3">
        <?php foreach($posts as $item) { ?>
            <tr>
                <td><?=$item['id']?></td>
                <td><a href="<?="/posts/".$item['id']?>"><?=$item['title']?></a></td>
                <td><?=$item['author']?></td>
                <td><?=date('d-m-Y',strtotime($item['updated_at']))?></td>
                <td>
                    <form action="/delete/" method="post">
                        <input type="hidden" name="post_id" value="<?= $item['id']?>">
                        <input class="btn btn-danger" type="submit" value="Удалить">
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div>
    </div>
</body>
</html>