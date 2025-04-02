<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

abstract class AbstractCli
{
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
    }
}