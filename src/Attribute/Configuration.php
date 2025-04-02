<?php

namespace Eightyfour\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Configuration
{
    private(set) string|false $controllerDir
        {
            set => $this->controllerDir = $value;
        }

    public function __construct(
        string $controller,
    ) {
        $this->controllerDir = realpath(path: APP_ROOT . DIRECTORY_SEPARATOR . $controller);
    }
}