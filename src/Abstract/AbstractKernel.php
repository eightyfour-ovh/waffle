<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Trait\DotenvTrait;
use Eightyfour\Trait\MicrokernelTrait;

abstract class AbstractKernel
{
    use MicrokernelTrait;
    use DotenvTrait;

    public function createRequestFromGlobals(): Request
    {
        // TODO: Implement createRequestFromGlobals() method.
        return new Request();
    }

    public function createCliFromRequest(): Cli
    {
        // TODO: Implement createCliFromRequest() method.
        return new Cli(cli: false);
    }

    public function run(Cli|Request $handler): void
    {
        $handler
            ->process()
            ->render()
        ;
    }
}