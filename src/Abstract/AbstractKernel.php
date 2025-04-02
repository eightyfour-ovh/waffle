<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Interface\ConfigInterface;
use Eightyfour\Trait\DotenvTrait;
use Eightyfour\Trait\MicrokernelTrait;

abstract class AbstractKernel
{
    use MicrokernelTrait;
    use DotenvTrait;

    protected(set) ?ConfigInterface $config
        {
            set => $this->config = $value;
        }

    public function configure(): self
    {
        // TODO: Implement configure() method.
        return $this;
    }

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