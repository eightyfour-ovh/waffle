<?php declare(strict_types=1);

namespace Eightyfour;

use Eightyfour\Abstract\AbstractKernel;
use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\KernelInterface;

class Kernel extends AbstractKernel implements KernelInterface
{
    public function boot(): self
    {
        $this->config = new Configuration();

        return $this;
    }
}