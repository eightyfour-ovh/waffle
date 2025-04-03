<?php

namespace Eightyfour\Router;

class Router
{
    private(set) string $directory
        {
            set => $this->directory = $value;
        }

    public function __construct(
        string|false $directory
    ) {
        // TODO: Handle non-existant directory ($directory === false)
        $this->directory = $directory === false ? '' : $directory;
    }
}