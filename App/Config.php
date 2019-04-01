<?php

namespace App;

class Config
{
    public $data;
    
    protected function __construct()
    {
        $this->data = include __DIR__ . '/../config.php';
    }
    
    public static function instance(): self
    {
        static $instance = null;
        
        if (!isset($instance)) {
            $instance = new self;
        }
        
        return $instance;
    }
}
