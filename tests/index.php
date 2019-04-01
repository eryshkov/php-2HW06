<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">

    <title>Site</title>
</head>
<body>
<div class="container">
    <div class="row" id="menu">
        <div class="col">
            <a href="/" class="btn btn-outline-success">Новости</a>
            <a href="/tests/" class="btn btn-outline-success">Тесты</a>
            <a href="/admin" class="btn btn-outline-success">Админ-Новости</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Если страница с тестом пустая, это означает, что он успешный.</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p>Доступные тесты:</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <ul>
                <li><a href="/tests/Db.php">Db</a></li>
                <li><a href="/tests/Article.php">Article</a></li>
                <li><a href="/tests/User.php">User</a></li>
                <li><a href="/tests/Config.php">Config</a></li>
                <li><a href="/tests/View.php">View</a></li>
                <li><a href="/log.txt">log</a></li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>