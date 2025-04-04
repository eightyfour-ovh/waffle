<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Attribute\Configuration;
use Eightyfour\Router\Router;
use Eightyfour\Trait\ReflectionTrait;
use Eightyfour\Trait\SystemTrait;

abstract class AbstractSystem
{
    use ReflectionTrait;
    use SystemTrait;

    protected(set) Configuration $config
        {
            set => $this->config = $value;
        }

    protected(set) ?Router $router = null
        {
            set => $this->router = $value;
        }
}