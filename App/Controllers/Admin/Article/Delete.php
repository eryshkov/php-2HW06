<?php

namespace App\Controllers\Admin\Article;

use App\Controllers\Controller;

class Delete extends Controller
{
    /**
     * @throws \App\Exceptions\DbErrorException
     * @throws \App\Exceptions\RecordNotFoundException
     */
    protected function handle(): void
    {
        $parameter = $this->getParameters();
        
        if (!empty($parameter)) {
            $article = \App\Models\Article::findById(reset($parameter));
            if (false !== $article) {
                $article->delete();
                header('Location:' . '/admin');
                return;
            }
        }
        
        header('Location:' . '/admin');
    }
}
