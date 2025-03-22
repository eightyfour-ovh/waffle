<?php declare(strict_types=1);

namespace EightyfourTests\Core;

use Eightyfour\Core\Request;
use Eightyfour\Core\Response;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function testProcess(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->process();

        // Expects
        $this->assertInstanceOf(Response::class, $result);
    }

    private function getClass(): Request
    {
        return new Request();
    }
}