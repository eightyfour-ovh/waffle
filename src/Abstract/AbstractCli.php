<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Trait\DotenvTrait;

abstract class AbstractCli
{
    use DotenvTrait;

    private(set) bool $cli
        {
            get => $this->cli;
            set => $this->cli = $value;
        }

    abstract public function __construct();

    public function configure(bool $cli): void
    {
        // TODO: Implement configure() method.
        $this->cli = $cli;
        $this->loadEnv();
    }
}