<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractRequest;
use Eightyfour\Interface\RequestInterface;

class Request extends AbstractRequest implements RequestInterface
{
    public function __construct(bool $cli = false)
    {
        $this->configure(cli: $cli);
    }
}