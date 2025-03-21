<?php

namespace Eightyfour\Abstract;

abstract class AbstractKernel
{
    public function __construct()
    {
    }

    public function run(): void
    {
        // TODO: Implement run() method.
    }

    public function fromRequest(): void
    {
        // TODO: Implement fromRequest() method.
    }

    public function fromCli(): void
    {
        // TODO: Implement fromCli() method.
    }

    public function toResponse(): void
    {
        // TODO: Implement toResponse() method.
    }
}