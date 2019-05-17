<?php

namespace App\Controllers;

class Article extends BaseController
{
    /**
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\RecordNotFoundException
     */
    protected function handle(): void
    {
        $id = $this->getRequestParameters()['id'];
        
        $this->view->article = \App\Models\Article::findById($id);
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }
}
