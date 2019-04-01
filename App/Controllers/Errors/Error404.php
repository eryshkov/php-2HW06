<?php

namespace App\Controllers\Errors;

use App\Controllers\Controller;

class Error404 extends Controller
{
    protected function handle(): void
    {
        $this->view->info = 'Ошибка 404. Страница не найдена';
        $this->view->display(__DIR__ . '/../../../templates/error.php');
    }
}
