<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractResponse;
use Eightyfour\Interface\ResponseInterface;

class Response extends AbstractResponse implements ResponseInterface
{
    public function __construct(Cli|Request $handler)
    {
        $this->build(handler: $handler);
    }
}