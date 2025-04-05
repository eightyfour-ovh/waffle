<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractKernel;
use Eightyfour\Abstract\AbstractSystem;
use Eightyfour\Attribute\Configuration;
use Eightyfour\Exception\SecurityException;
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
        try {
            /** @var Kernel $kernel */
            $this->security->analyze(object: $kernel, expectations: [
                Kernel::class,
                AbstractKernel::class,
                KernelInterface::class,
            ]);
            if ($kernel->config instanceof Configuration) {
                $this->router = new Router(directory: $kernel->config->controllerDir)
                    ->boot()
                    ->registerRoutes()
                ;
            }
        } catch (SecurityException $e) {
            $e->throw(view: new View(data: $e->serialize()));
        } finally {

            return $this;
        }
    }
}