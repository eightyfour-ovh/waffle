<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use ReflectionParameter;

abstract class AbstractCli
{
    private(set) bool $cli = true
        {
            set => $this->cli = $value;
        }

    /**
     * @var array{
     *     classname: string,
     *     method: non-empty-string,
     *     arguments: array<non-empty-string, string>,
     *     path: string,
     *     name: non-falsy-string
     * }|null
     */
    private(set) ?array $currentRoute = null
        {
            set => $this->currentRoute = $value;
        }

    abstract public function __construct(bool $cli = true);

    public function configure(bool $cli): void
    {
        $this->cli = $cli;
    }

    /**
     * @param array{
     *      classname: string,
     *      method: non-empty-string,
     *      arguments: array<non-empty-string, string>,
     *      path: string,
     *      name: non-falsy-string
     *  }|null $route
     * @return $this
     */
    public function setCurrentRoute(?array $route = null): self
    {
        $this->currentRoute = $route;

        return $this;
    }
}