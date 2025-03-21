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
        // TODO: Implement isCli() method.

        return false;
    }

    public function createRequestFromGlobals(): Request
    {
        // TODO: Implement createRequestFromGlobals() method.
        $request = new Request();
        $request->configure();

        return $request;
    }

    public function createCli(): Cli
    {
        // TODO: Implement createCli() method.

        return new Cli();
    }

    public function run(Cli|Request $handler): void
    {
        // TODO: Implement run() method.
    }
}