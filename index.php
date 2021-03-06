<?php
/**
 * @var \App\Controllers\BaseController $ctrl
 */

use App\Controllers\BaseController;
use App\Controllers\Errors\Error404;
use App\Controllers\Errors\RecNotFound;
use App\Controllers\Errors\SmthWrong;
use App\Exceptions\ControllerNotFoundException;
use App\Exceptions\DbErrorException;
use App\Exceptions\RecordNotFoundException;
use App\Logger;
use App\Mailer;
use App\Router;

require __DIR__ . '/autoload.php';

try {
    $ctrlClass = (new Router())->getControllerName();
    if (!class_exists($ctrlClass)) {
        throw new ControllerNotFoundException($ctrlClass);
    }
    /** @var BaseController $ctrl */
    $ctrl = new $ctrlClass;
    $ctrl->action();
} catch (DbErrorException $e) {
    Logger::log($e);
    $mailer = new Mailer();
    $mailer->mail('Warning', $e->getMessage());
    $ctrl = new SmthWrong();
    $ctrl->action();
} catch (RecordNotFoundException $e) {
    Logger::log($e);
    $ctrl = new RecNotFound();
    $ctrl->action();
} catch (ControllerNotFoundException $e) {
    Logger::log($e);
    $ctrl = new Error404();
    $ctrl->action();
}
