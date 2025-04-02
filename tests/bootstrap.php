<?php declare(strict_types=1);

use App\Kernel;

define('APP_ROOT', realpath(path: dirname(path: __DIR__)));

new Kernel()->loadEnv();
