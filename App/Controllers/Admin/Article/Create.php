<?php

namespace App\Controllers\Admin\Article;

use App\Controllers\BaseController;

class Create extends BaseController
{
    /**
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\Errors
     */
    protected function handle(): void
    {
        if (isset($_POST['title'], $_POST['content'])) {
            $article = new \App\Models\Article();
            
            $article->fill($_POST);
            $article->insert();
            
            header('Location:' . '/admin');
            return;
        }
    }
}
