<?php declare(strict_types=1);

namespace Eightyfour\Interface;

interface SystemInterface
{
    public function boot(KernelInterface $kernel): self;
}