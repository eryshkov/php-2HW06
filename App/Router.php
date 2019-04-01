<?php

namespace App;

class Router
{
    protected $parameters = [];
    protected $controllerName = '';

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriParts = explode('/', $uri);

        $goodURIParts = [];
        foreach ($uriParts as $part) {
            if (!isset($part) || '' === $part) {
                continue;
            }

            if (is_numeric($part)) {
                $this->parameters[] = $part;
                continue;
            }

            $goodURIParts[] = ucfirst($part);
        }

        if (empty($goodURIParts)) {
            $goodURIParts[] = 'Index';
        }

        $this->controllerName = '\App\Controllers\\' . implode('\\', $goodURIParts);
    }

    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
