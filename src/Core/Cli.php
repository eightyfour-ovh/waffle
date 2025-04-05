<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractCli;
use Eightyfour\Interface\CliInterface;

class Cli extends AbstractCli implements CliInterface
{
    public function __construct(bool $cli = true)
    {
        $this->configure(cli: $cli);
    }
}