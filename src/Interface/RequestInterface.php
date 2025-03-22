<?php declare(strict_types=1);

namespace Eightyfour\Interface;

use Eightyfour\Core\Response;

interface RequestInterface
{
    public function configure(): void;

    public function process(): Response;
}