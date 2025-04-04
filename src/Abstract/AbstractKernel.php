<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Attribute\Configuration;
use Eightyfour\Core\Cli;
use Eightyfour\Core\Constant;
use Eightyfour\Core\Request;
use Eightyfour\Router\Router;
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

    protected(set) ?Router $router = null
        {
            set => $this->router = $value;
        }

    public function configure(): self
    {
        // TODO: Implement configure() method.
        $this->config = $this->newAttributeInstance(className: $this->config, attribute: Configuration::class);
        if ($this->config instanceof Configuration) {
            $this->router = new Router(directory: $this->config->controllerDir)
                ->boot()
                ->registerRoutes()
            ;
        }

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
            if ($this->router !== null) {
                foreach ($this->router->routes as $route) {
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