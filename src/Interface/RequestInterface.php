<?php

namespace Eightyfour\Interface;

use Eightyfour\Abstract\AbstractRequest;

interface RequestInterface
{
    static public function createFromGlobals(): AbstractRequest;
}