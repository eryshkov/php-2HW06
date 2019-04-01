<?php

namespace App\Controllers\Errors;

use App\Controllers\Controller;

class SmthWrong extends Controller
{
    protected function handle(): void
    {
        $this->view->info = 'Что-то пошло не так';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}
