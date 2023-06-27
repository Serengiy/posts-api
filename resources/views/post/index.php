<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="container p-5">
    <h1 class="text-center">Все посты</h1>
    <table class="table mt-5">
        <thead class="thead-light">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($posts as $item) { ?>
            <tr>
                <td><?=$item['id']?></td>
                <td><?=$item['title']?></td>
                <td><?=$item['author']?></td>
                <td><?=$item['date']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="d-grid">
            <h3 class="text-center">Новый пост</h3>
            <form action="/posts" method="post">
                <input type="text" placeholder="text" name="text">
                <input type="submit">
            </form>
        </div>
    </div>
</body>
</html>