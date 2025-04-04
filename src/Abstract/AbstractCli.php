<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use ReflectionParameter;

abstract class AbstractCli
{
    private(set) bool $cli
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
    private(set) ?array $currentRoute
        {
            set => $this->currentRoute = $value;
        }

    abstract public function __construct(bool $cli = true);

    public function configure(bool $cli): void
    {
        $this->cli = $cli;
    }
}