<?php declare(strict_types=1);

namespace Core;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Core\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testRenderFromCli(): void
    {
        // Given
        $class = $this->getClassFromCli();

        // When
        $class->render();

        // Expects
        $this->expectNotToPerformAssertions();
    }

    public function testRenderFromRequest(): void
    {
        // Given
        $class = $this->getClassFromRequest();

        // When
        $class->render();

        // Expects
        $this->expectNotToPerformAssertions();
    }

    private function getClassFromCli(): Response
    {
        $handler = new Cli();

        return new Response(handler: $handler);
    }

    private function getClassFromRequest(): Response
    {
        $handler = new Request();

        return new Response(handler: $handler);
    }
}