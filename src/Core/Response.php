<?php

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractResponse;
use Eightyfour\Interface\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    public function __construct(Cli|Request $handler)
    {
        // TODO: Implement __construct() method.
        $this->build(handler: $handler);
    }
}