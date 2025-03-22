<?php

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractCli;
use Eightyfour\Interface\CliInterface;

class Cli extends AbstractCli implements CliInterface
{
    public function __construct()
    {
        // TODO: Implement __construct() method.
        $this->configure();
    }

    public function process(): Response
    {
        // TODO: Implement process() method.

        return new Response(handler: $this);
    }
}