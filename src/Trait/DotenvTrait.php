<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use Symfony\Component\Dotenv\Dotenv;

trait DotenvTrait
{
    public function loadEnv(): void
    {
        $dotenv = new Dotenv();
        $dotenv->loadEnv(path: APP_ROOT . '/.env');
    }
}