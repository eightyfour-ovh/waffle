<?php

namespace Eightyfour\Interface;

use Eightyfour\Core\Response;

interface RequestInterface
{
    public function configure(): void;

    public function process(): Response;
}