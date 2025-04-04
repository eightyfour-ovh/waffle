<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Constant;
use Eightyfour\Core\Request;
use Eightyfour\Core\System;
use Eightyfour\Trait\DotenvTrait;
use Eightyfour\Trait\MicrokernelTrait;
use Eightyfour\Trait\ReflectionTrait;

abstract class AbstractKernel
{
    use MicrokernelTrait;
    use DotenvTrait;
    use ReflectionTrait;

    protected(set) object $config
        {
            set => $this->config = $value;
        }

    protected(set) ?System $system = null
        {
            set => $this->system = $value;
        }

    public function configure(): self
    {
        // TODO: Implement configure() method.
        $this->system = new System()->boot(kernel: $this);

        return $this;
    }

    public function createRequestFromGlobals(): Request
    {
        // TODO: Implement createRequestFromGlobals() method.
        $req = new Request()->setCurrentRoute();
        if ($req->cli === false) {
            /** @var string $reqUri */
            $reqUri = !empty($req->server[Constant::REQUEST_URI]) ?
                $req->server[Constant::REQUEST_URI] : '?';
            $uri = explode(separator: '?', string: $reqUri);
            if ($this->system !== null && $this->system->router !== null) {
                foreach ($this->system->router->routes as $route) {
                    if ($route[Constant::PATH] !== $uri[0]) {
                        continue;
                    }
                    $req->setCurrentRoute(route: $route);
                }
            }
        }

        return $req;
    }

    public function createCliFromRequest(): Cli
    {
        // TODO: Implement createCliFromRequest() method.
        return new Cli(cli: false)->setCurrentRoute();
    }

    public function run(Cli|Request $handler): void
    {
        $handler
            ->process()
            ->render()
        ;
    }
}