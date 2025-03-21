<?php

namespace Eightyfour;

use Eightyfour\Abstract\AbstractKernel;
use Eightyfour\Abstract\AbstractRequest;
use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Interface\KernelInterface;

class Kernel extends AbstractKernel implements KernelInterface
{
    public function isCli(): bool
    {
        return false;
    }

    public function createRequestFromGlobals(): Request
    {
        return new Request();
    }

    public function createCli(): Cli
    {
        return new Cli();
    }

    public function run(Cli|Request $handler): void
    {
        // TODO: Implement run() method.
    }
}