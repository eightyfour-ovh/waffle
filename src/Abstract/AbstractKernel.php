<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Attribute\Configuration;
use Eightyfour\Core\Cli;
use Eightyfour\Core\Constant;
use Eightyfour\Core\Request;
use Eightyfour\Core\Security;
use Eightyfour\Core\System;
use Eightyfour\Interface\CliInterface;
use Eightyfour\Interface\KernelInterface;
use Eightyfour\Interface\RequestInterface;
use Eightyfour\Trait\DotenvTrait;
use Eightyfour\Trait\MicrokernelTrait;
use Eightyfour\Trait\ReflectionTrait;

abstract class AbstractKernel implements KernelInterface
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

    public function boot(): self
    {
        $this->config = new Configuration();

        return $this;
    }

    public function configure(): self
    {
        $this->config = $this->newAttributeInstance(className: $this->config, attribute: Configuration::class);
        $security = new Security(cfg: $this->config);
        $this->system = new System(security: $security)->boot(kernel: $this);

        return $this;
    }

    public function createRequestFromGlobals(): RequestInterface
    {
        $req = new Request()->setCurrentRoute();
        if ($req->cli === false) {
            /** @var string $reqUri */
            $reqUri = !empty($req->server[Constant::REQUEST_URI]) ?
                $req->server[Constant::REQUEST_URI] : '?';
            $uri = explode(separator: '?', string: $reqUri);
            if ($this->system instanceof System && $this->system->router !== null) {
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

    public function createCliFromRequest(): CliInterface
    {
        return new Cli(cli: false)->setCurrentRoute();
    }

    public function run(CliInterface|RequestInterface $handler): void
    {
        $handler
            ->process()
            ->render()
        ;
    }
}