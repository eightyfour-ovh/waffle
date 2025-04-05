<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

abstract class AbstractSecurity
{
    protected(set) int $level
        {
            set => $this->level = $value;
        }

    abstract public function __construct(object $config);
}