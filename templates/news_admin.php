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
    $info = $this->info;
    if (isset($info)) {
        ?>
        <div class="row">
            <div class="col-auto">
                <div class="alert alert-danger" role="alert">
                    <?php echo $info; ?>
                </div>
            </div>
        </div>
        <?php
    } ?>
    <div class="row">
        <div class="col">
            <a class="btn btn-outline-primary mb-1" href="/admin/article/add">Добавить новость</a>
        </div>
    </div>
    <?php
    foreach ($this->articles as $article) {
        ?>
        <div class="row mb-1">
            <div class="col-auto">
                <a class="btn btn-outline-info" href="/admin/article/<?php echo $article->id; ?>/edit/">✎</a>
            </div>
            <div class="col-auto">
                <a class="btn btn-outline-danger" href="/admin/article/<?php echo $article->id; ?>/delete/">X</a>
            </div>
            <div class="col">
                <a href="/article/<?php echo $article->id; ?>"><?php echo $article->title; ?></a>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>