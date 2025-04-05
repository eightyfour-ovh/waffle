<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractSecurity;
use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\SecurityInterface;

class Security extends AbstractSecurity implements SecurityInterface
{
    public function __construct(object $cfg)
    {
        if ($cfg instanceof Configuration) {
            $this->level = $cfg->securityLevel;
        }
    }
}