<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

abstract class AbstractCli
{
    private(set) bool $cli
        {
            set => $this->cli = $value;
        }

    abstract public function __construct(bool $cli = true);

    public function configure(bool $cli): void
    {
        $this->cli = $cli;
    }
}