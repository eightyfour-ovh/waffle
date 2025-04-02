<?php declare(strict_types=1);

namespace Eightyfour\Interface;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

interface KernelInterface
{
    public function isCli(): bool;

    public function createRequestFromGlobals(): Request;

    public function createCliFromRequest(): Cli;

    public function run(Cli|Request $handler): void;
}