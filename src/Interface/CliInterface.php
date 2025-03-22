<?php

namespace Eightyfour\Interface;

use Eightyfour\Core\Response;

interface CliInterface
{
    public function configure(): void;

    public function process(): Response;
}