<?php

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

abstract class AbstractKernel
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
        $cli = new Cli();
        $cli->configure();

        return $cli;
    }

    public function run(Cli|Request $handler): void
    {
        // TODO: Implement run() method.
        $handler->process();
    }
}