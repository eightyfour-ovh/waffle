<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use Eightyfour\Core\Constant;
use ReflectionMethod;
use ReflectionObject;

trait ReflectionTrait
{
    public function className(string $path): string
    {
        $className = str_replace(search: Constant::PHPEXT, replace: '', subject: $path);
        $className = str_replace(search: APP_ROOT . DIRECTORY_SEPARATOR, replace: '', subject: $className);
        $className = str_replace(search: DIRECTORY_SEPARATOR, replace: '\\', subject: $className);

        return ucfirst(string: $className);
    }

    public function newAttributeInstance(object $className, string $attribute): object
    {
        $obj = $object = new ReflectionObject(object: $className);
        foreach ($object->getAttributes(name: $attribute) as $attr) {
            $obj = $attr->newInstance();
        }

        return $obj;
    }

    /**
     * @param object $className
     * @return ReflectionMethod[]
     */
    public function getMethods(object $className): array
    {
        return new ReflectionObject(object: $className)->getMethods();
    }
}