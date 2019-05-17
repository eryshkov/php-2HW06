<?php

namespace App\Controllers\Admin\Article;

use App\Controllers\BaseController;

class EditPresenter extends BaseController
{
    /**
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\RecordNotFoundException
     */
    protected function handle(): void
    {
        $id = $this->getRequestParameters()['id'];
        
        if (isset($id)) {
            $this->view->article = \App\Models\Article::findById($id);
            if (false === $this->view->article) {
                header('Location:' . '/admin');
                return;
            }
        }
        
        $this->view->display(__DIR__ . '/../../../../templates/news_edit.php');
    }
}
