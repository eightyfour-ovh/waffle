<?php declare(strict_types=1);

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractRequest;
use Eightyfour\Interface\RequestInterface;

class Request extends AbstractRequest implements RequestInterface
{
    public function __construct()
    {
        // TODO: Implement __construct() method.
        $this->configure(cli: false);
    }

    public function process(): Response
    {
        // TODO: Implement process() method.

        return new Response(handler: $this);
    }
}