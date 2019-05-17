<?php

namespace App\Controllers;

use App\Router;
use App\View;

abstract class BaseController
{
    protected $view;
    
    public function __construct()
    {
        $this->view = new View();
    }
    
    public function action(): void
    {
        if ($this->access()) {
            $this->handle();
            return;
        }
        
        die('Доступ закрыт');
    }
    
    protected function access(): bool
    {
        return true;
    }
    
    abstract protected function handle(): void;
    
    /**
     * @return array|null
     */
    public function getRequestParameters(): ?array
    {
        return (new Router())->getRequestParameters();
    }
}