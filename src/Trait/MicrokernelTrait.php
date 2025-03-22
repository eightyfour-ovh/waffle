<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

trait MicrokernelTrait
{
    public function configurator(Cli|Request $handler): void
    {
        $handler->configure();
    }
}