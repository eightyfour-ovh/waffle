<?php

namespace Eightyfour\Core;

use Eightyfour\Abstract\AbstractController;
use Eightyfour\Interface\BaseControllerInterface;

class BaseController extends AbstractController implements BaseControllerInterface
{
    /**
     * @param array<mixed> $data
     * @param string|null $format
     * @param array<mixed>|null $groups
     * @return void
     */
    public function render(array $data = [], ?string $format = 'json', ?array $groups = []): void
    {
        // TODO: Implement render() method.
    }
}