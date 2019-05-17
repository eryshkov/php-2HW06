<?php

namespace App\Controllers\Errors;

use App\Controllers\BaseController;

class Error404 extends BaseController
{
    protected function handle(): void
    {
        $this->view->info = 'Ошибка 404. Страница не найдена';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}
