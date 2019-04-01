<?php /** @noinspection ALL */

use App\View;

require __DIR__ . '/../autoload.php';

$view = new View();
$view->article = \App\Models\Article::findById(1);
foreach ($view as $key => $property) {
    assert($property instanceof \App\Models\Article);
}

$view->articles = \App\Models\Article::getAllLast();
foreach ($view as $key => $property) {
    if ('articles' === $key) {
        assert(is_array($property));
    }
}

assert(2 === count($view));
