<?php

namespace Eightyfour\Interface;

interface BaseControllerInterface
{
    /**
     * @param array<mixed> $data
     * @param string|null $format
     * @param array<mixed>|null $groups
     * @return void
     */
    public function render(array $data = [], ?string $format = 'json', ?array $groups = []): void;
}