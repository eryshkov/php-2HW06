<?php

namespace App\Controllers\Errors;

use App\Controllers\BaseController;

class SmthWrong extends BaseController
{
    protected function handle(): void
    {
        $this->view->info = 'Что-то пошло не так';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}
