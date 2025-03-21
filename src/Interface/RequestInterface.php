<?php

namespace Eightyfour\Interface;

use Eightyfour\Abstract\AbstractRequest;

interface RequestInterface
{
    public function configure(): void;

    public function process(): void;
}