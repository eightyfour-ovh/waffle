<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Security;
use Eightyfour\Interface\SystemInterface;
use Eightyfour\Router\Router;
use Eightyfour\Trait\ReflectionTrait;
use Eightyfour\Trait\SystemTrait;

abstract class AbstractSystem implements SystemInterface
{
    use ReflectionTrait;
    use SystemTrait;

    protected(set) ?Security $security = null
        {
            set => $this->security = $value;
        }

    protected(set) object $config
        {
            set => $this->config = $value;
        }

    protected(set) ?Router $router = null
        {
            set => $this->router = $value;
        }

    abstract public function __construct(Security $security);
}