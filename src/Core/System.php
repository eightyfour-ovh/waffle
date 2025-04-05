<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractKernel;
use Eightyfour\Abstract\AbstractSystem;
use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\KernelInterface;
use Eightyfour\Interface\SystemInterface;
use Eightyfour\Kernel;
use Eightyfour\Router\Router;

class System extends AbstractSystem implements SystemInterface
{
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function boot(KernelInterface $kernel): self
    {
        /** @var Kernel $kernel */
        $isKernelValid = $this->security?->isValid(object: $kernel, expectations: [
            Kernel::class,
            AbstractKernel::class,
            KernelInterface::class,
        ]);
        $securityLevel = $kernel->config instanceof Configuration ?
            $kernel->config->securityLevel : Constant::SECURITY_LEVEL10;
        $isKernelSecure = $this->security?->isSecure(object: $kernel, level: $securityLevel);
        if ($isKernelValid && $isKernelSecure) {
            if ($kernel->config instanceof Configuration) {
                $this->router = new Router(directory: $kernel->config->controllerDir)
                    ->boot()
                    ->registerRoutes()
                ;
            }
        }

        return $this;
    }
}