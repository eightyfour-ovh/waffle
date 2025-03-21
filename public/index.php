<?php

use App\Kernel;

require_once __DIR__ . '/../vendor/autoload.php';

$kernel = new Kernel();

$handler = $kernel->isCli() ?
    $kernel->createCli() : $kernel->createRequestFromGlobals();

$kernel->run(handler: $handler);
