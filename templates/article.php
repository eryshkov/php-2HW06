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
    $article = $this->article;
    if (false !== $article) {
        ?>
        <div class="row">
            <div class="col">
                <h3><?php echo $article->title; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <blockquote class="blockquote">
                    <p class="mb-0"><?php echo $article->content; ?></p>
                    <?php
                    if (isset($article->author)) {
                        ?>
                        <footer class="blockquote-footer"><?php echo $article->author->name; ?></footer>
                        <?php
                    }
                    ?>
                </blockquote>
            </div>
        </div>
        <?php
    } ?>
</div>
</body>
</html>