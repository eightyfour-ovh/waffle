<?php declare(strict_types=1);

namespace Core;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Constant;
use Eightyfour\Core\Request;
use Eightyfour\Core\Response;
use PHPUnit\Framework\MockObject\Exception;
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

    /**
     * @throws Exception
     */
    private function getClassFromCli(): Response
    {
        $handler = $this->createMock(Cli::class);
        $handler
            ->expects($this->any())
            ->method('configure')
        ;

        return new Response(handler: $handler);
    }

    /**
     * @throws Exception
     */
    private function getClassFromRequest(): Response
    {
        $handler = $this->createMock(Request::class);
        $handler
            ->expects($this->any())
            ->method('configure')
        ;

        return new Response(handler: $handler);
    }
}