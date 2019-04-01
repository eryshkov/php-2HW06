<?php

/**
 * @param $class
 */
function autoload($class)
{
    $file = str_replace('\\', '/', $class) . '.php';
    require __DIR__ . '/' . $file;
}

spl_autoload_register('autoload');
