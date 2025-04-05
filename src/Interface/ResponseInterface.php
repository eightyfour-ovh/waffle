<?php declare(strict_types=1);

namespace Eightyfour\Interface;

interface ResponseInterface
{
    public function build(CliInterface|RequestInterface $handler): void;

    public function render(): void;
}