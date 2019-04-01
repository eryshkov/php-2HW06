<?php

namespace App;

class Logger
{
    public static function log(\Exception $data): void
    {
        $config = require __DIR__ . '/../config.php';
        $storage = $config['log'];

        $date = date(DATE_ATOM);
        $logString = [
            $date,
            $data->getFile(),
            $data->getLine(),
            get_class($data),
            $data->getMessage(),
        ];

        file_put_contents($storage, implode(' | ', $logString) . PHP_EOL, FILE_APPEND);
    }
}
