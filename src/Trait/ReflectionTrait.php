<?php declare(strict_types=1);

namespace Eightyfour\Trait;

use ReflectionObject;

trait ReflectionTrait
{
    public function className(string $path): string
    {
        $className = str_replace(search: '.php', replace: '', subject: $path);
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
}