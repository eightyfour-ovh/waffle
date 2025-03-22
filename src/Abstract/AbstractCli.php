<?php

namespace Eightyfour\Abstract;

use Eightyfour\Trait\DotenvTrait;

abstract class AbstractCli
{
    use DotenvTrait;

    public function configure(): void
    {
        // TODO: Implement configure() method.
        $this->loadEnv();
    }

    public function process(): void
    {
        // TODO: Implement process() method.
    }
}