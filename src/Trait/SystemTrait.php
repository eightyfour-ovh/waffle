<?php declare(strict_types=1);

namespace Eightyfour\Trait;

trait SystemTrait
{
    /**
     * @param object|null $object
     * @param string[] $expectations
     * @return bool
     */
    public function isValid(?object $object = null, array $expectations = []): bool
    {
        // TODO: Implement isSecure() method.
        if (array_any($expectations, fn($expectation) => $object instanceof $expectation)) {
            return true;
        }

        return false;
    }

    public function isSecure(?object $object = null): bool
    {
        // TODO: Implement isSecure() method.

        return $object !== null;
    }
}