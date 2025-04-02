<?php

namespace Eightyfour\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Router
{
    public function __construct(
        string $path,
        string $type = 'Attribute',
        bool $recursiveScan = true,
    ) {
    }
}