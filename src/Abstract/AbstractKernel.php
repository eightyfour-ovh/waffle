<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Trait\MicrokernelTrait;

abstract class AbstractKernel
{
    use MicrokernelTrait;

    public function isCli(): bool
    {
        return match (php_sapi_name()) {
            'cli' => true,
            default => false,
        };
    }

    public function createRequestFromGlobals(): Request
    {
        // TODO: Implement createRequestFromGlobals() method.
        $request = new Request();
        $this->configurator(handler: $request);

        return $request;
    }

    public function createCli(): Cli
    {
        // TODO: Implement createCli() method.
        $cli = new Cli();
        $this->configurator(handler: $cli);

        return $cli;
    }

    public function run(Cli|Request $handler): void
    {
        // TODO: Implement run() method.
        $handler
            ->process()
            ->render()
        ;
    }
}