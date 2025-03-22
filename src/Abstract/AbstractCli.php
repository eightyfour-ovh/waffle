<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Trait\DotenvTrait;

abstract class AbstractCli
{
    use DotenvTrait;

    abstract public function __construct();

    public function configure(): void
    {
        // TODO: Implement configure() method.
        $this->loadEnv();
    }
}