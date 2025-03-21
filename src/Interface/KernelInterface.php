<?php

namespace Eightyfour\Interface;

interface KernelInterface
{
    function run(): void;

    function fromRequest(): void;

    function fromCli(): void;

    function toResponse(): void;
}