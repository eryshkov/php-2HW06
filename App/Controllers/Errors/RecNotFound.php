<?php

namespace App\Controllers\Errors;

use App\Controllers\BaseController;

class RecNotFound extends BaseController
{
    protected function handle(): void
    {
        $this->view->info = 'Запись не найдена в базе данных';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}
