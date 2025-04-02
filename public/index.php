<?php declare(strict_types=1);

use App\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

define('APP_ROOT', realpath(path: dirname(path: __DIR__)));

$kernel = new Kernel();
$kernel->loadEnv();

// TODO: Handle CLI requests later from this
$handler = $kernel->isCli() ?
    $kernel->createCliFromRequest() : $kernel->createRequestFromGlobals();

$kernel->run(handler: $handler);
