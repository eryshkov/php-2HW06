<?php
require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $file = str_replace('\\', '/', $class) . '.php';
    
    $fullPath = __DIR__ . '/' . $file;
    if (file_exists($fullPath)) {
        require $fullPath;
    }
});
