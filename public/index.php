<?php declare(strict_types=1);

use App\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

define('APP_ROOT', realpath(path: dirname(path: __DIR__)));

$kernel = new Kernel();

$handler = $kernel->isCli() ?
    $kernel->createCli() : $kernel->createRequestFromGlobals();

$kernel->run(handler: $handler);
