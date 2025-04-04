<?php declare(strict_types=1);

namespace Eightyfour\Attribute;

use Attribute;
use Eightyfour\Interface\ConfigInterface;

#[Attribute(Attribute::TARGET_CLASS)]
class Configuration implements ConfigInterface
{
    private(set) string|false $controllerDir
        {
            set => $this->controllerDir = $value;
        }

    private(set) string|false $serviceDir
        {
            set => $this->serviceDir = $value;
        }

    public function __construct(
        string $controller = 'app/Controller',
        string $service = 'app/Service',
    ) {
        $this->controllerDir = realpath(path: APP_ROOT . DIRECTORY_SEPARATOR . $controller);
        $this->serviceDir = realpath(path: APP_ROOT . DIRECTORY_SEPARATOR . $service);
    }
}