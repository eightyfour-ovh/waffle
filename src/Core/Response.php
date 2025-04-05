<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractResponse;
use Eightyfour\Interface\CliInterface;
use Eightyfour\Interface\RequestInterface;
use Eightyfour\Interface\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    public function __construct(CliInterface|RequestInterface $handler)
    {
        $this->build(handler: $handler);
    }
}