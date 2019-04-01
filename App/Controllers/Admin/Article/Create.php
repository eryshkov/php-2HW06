<?php

namespace App\Controllers\Admin\Article;

use App\Controllers\Controller;

class Create extends Controller
{
    /**
     * @throws \App\Exceptions\DbErrorException
     */
    protected function handle(): void
    {
        if (isset($_POST['title'], $_POST['content'])) {
            $article = new \App\Models\Article();

            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->insert();

            header('Location:' . '/admin');
            return;
        }
    }
}
