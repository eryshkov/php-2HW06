<?php

namespace App\Controllers;

class Index extends Controller
{
    /**
     * @throws \App\Exceptions\DbErrorException
     */
    protected function handle(): void
    {
        $this->view->articles = \App\Models\Article::getAllLast(3);
        echo $this->view->render(__DIR__ . '/../../templates/news.php');
    }
}
