<?php

namespace App\Exceptions;

class ControllerNotFoundException extends BaseException
{
    /**
     * ControllerNotFoundException constructor.
     * @param string $controllerClassName
     */
    public function __construct(string $controllerClassName)
    {
        parent::__construct();
        $this->message = $controllerClassName;
    }
}
