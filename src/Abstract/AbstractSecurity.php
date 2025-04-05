<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Trait\SecurityTrait;

abstract class AbstractSecurity
{
    use SecurityTrait;

    protected(set) int $level
        {
            set => $this->level = $value;
        }

    abstract public function __construct(object $config);
}