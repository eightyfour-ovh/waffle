<?php

namespace Eightyfour\Core;

readonly class View
{
    /**
     * @param array<mixed>|null $data
     */
    public function __construct(
        public ?array $data = null
    ) {}
}
