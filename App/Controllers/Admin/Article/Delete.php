<?php

namespace App\Controllers\Admin\Article;

use App\Controllers\BaseController;

class Delete extends BaseController
{
    /**
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\RecordNotFoundException
     */
    protected function handle(): void
    {
        $id = $this->getRequestParameters()['id'];
        
        if (!isset($id)) {
            header('Location:' . '/admin');
        }
    
        $article = \App\Models\Article::findById($id);
        if (false !== $article) {
            $article->delete();
            header('Location:' . '/admin');
            return;
        }
    }
}
