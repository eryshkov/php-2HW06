<?php
/**
 * @var \App\Controllers\Controller $ctrl
 */

use App\Controllers\Errors\RecNotFound;
use App\Controllers\Errors\SmthWrong;
use App\Exceptions\DbErrorException;
use App\Exceptions\RecordNotFoundException;
use App\Logger;
use App\Mailer;
use App\Router;

require __DIR__ . '/autoload.php';

try {
    $router = new Router();
    $ctrlClass = $router->getControllerName();
    $ctrl = new $ctrlClass;
    $ctrl->setParameters($router->getParameters());
    $ctrl->action();
} catch (DbErrorException $e) {
    Logger::log($e);
    Mailer::mail('Warning', $e->getMessage());
    $ctrl = new SmthWrong();
    $ctrl->action();
} catch (RecordNotFoundException $e) {
    Logger::log($e);
    $ctrl = new RecNotFound();
    $ctrl->action();
}
