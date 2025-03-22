<?php declare(strict_types=1);

namespace Eightyfour\Interface;

use Eightyfour\Core\Response;

interface CliInterface
{
    public function configure(bool $cli): void;

    public function process(): Response;
}