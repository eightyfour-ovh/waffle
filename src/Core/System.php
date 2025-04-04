<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractKernel;
use Eightyfour\Abstract\AbstractSystem;
use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\SystemInterface;
use Eightyfour\Kernel;
use Eightyfour\Router\Router;

class System extends AbstractSystem implements SystemInterface
{
    public function boot(Kernel|AbstractKernel $kernel): self
    {
        // TODO: Implement boot() method.
        $isKernelValid = $this->isValid(object: $kernel, expectations: [
            Kernel::class,
            AbstractKernel::class,
        ]);
        $isKernelSecure = $this->isSecure(object: $kernel);
        if ($isKernelValid && $isKernelSecure) {
            $this->config = $this->newAttributeInstance(className: $kernel->config, attribute: Configuration::class);
            $this->router = new Router(directory: $this->config->controllerDir)
                ->boot()
                ->registerRoutes()
            ;
        }

        return $this;
    }
}