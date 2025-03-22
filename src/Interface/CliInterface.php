<?php

namespace Eightyfour\Interface;

interface CliInterface
{
    public function configure(): void;

    public function process(): void;
}