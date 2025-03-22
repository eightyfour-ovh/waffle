<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

trait MicrokernelTrait
{
    public function isCli(): bool
    {
        return match (php_sapi_name()) {
            'cli' => true,
            default => false,
        };
    }

    public function configurator(Cli|Request $handler): void
    {
        $handler->configure(cli: $this->isCli());
    }
}