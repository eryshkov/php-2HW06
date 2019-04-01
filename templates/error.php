<?php
/**
 * @var \App\View $this
 */
?>
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
    <?php
    if (isset($this->info)) {
        ?>
        <div class="row">
            <div class="col-auto">
                <div class="alert alert-danger" role="alert">
                    <?php echo $this->info; ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col">
            <a href="/">Вернуться на главную</a>
        </div>
    </div>
</div>
</body>
</html>