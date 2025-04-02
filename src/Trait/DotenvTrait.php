<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use Symfony\Component\Dotenv\Dotenv;

trait DotenvTrait
{
    public function loadEnv(bool $tests = false): void
    {
        $dotenv = new Dotenv();
        $test = $tests ? '' : '.test';
        $dotenv->loadEnv(path: APP_ROOT . "/.env$test");
    }
}