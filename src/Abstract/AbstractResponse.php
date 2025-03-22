<?php

namespace Eightyfour\Abstract;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

abstract class AbstractResponse
{
    abstract public function __construct(Cli|Request $handler);

    public function build(Cli|Request $handler): void
    {
        // TODO: Implement build() method.
    }

    public function render(): void
    {
        // TODO: Implement render() method.
    }
}