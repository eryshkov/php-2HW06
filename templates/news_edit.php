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
    if (isset($article)) {
        ?>
        <div class="row">
            <div class="col">
                <form action="/admin/article/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?php echo $article->title; ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="author" value="<?php
                        if (isset($article->author)) {
                            echo $article->author->name;
                        }
                        ?>" disabled>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="content" cols="30"
                                  rows="10"><?php echo $article->content; ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="col-auto">
                            <a href="/admin" class="btn-outline-secondary btn form-control">Отмена</a>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary form-control" type="submit">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>