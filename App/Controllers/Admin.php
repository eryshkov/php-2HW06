<?php

namespace App\Controllers;

class Admin extends BaseController
{
    /**
     * @throws \App\Exceptions\DbErrorException
     */
    protected function handle(): void
    {
        $this->view->articles = \App\Models\Article::getAllLast();
        echo $this->view->render(__DIR__ . '/../../templates/news_admin.php');
    }
}
