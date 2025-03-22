<?php declare(strict_types=1);

namespace Eightyfour\Interface;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

interface ResponseInterface
{
    public function build(Cli|Request $handler): void;

    public function render(): void;
}