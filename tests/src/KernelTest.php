<?php declare(strict_types=1);

namespace EightyfourTests;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Core\Response;
use Eightyfour\Kernel;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class KernelTest extends TestCase
{
    public function testIsCli(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->isCli();

        // Expects
        $this->assertTrue($result);
    }

    public function testCreateRequestFromGlobals(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->createRequestFromGlobals();

        // Expects
        $this->assertInstanceOf(expected: Request::class, actual: $result);
    }

    public function testCreateCli(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->createCli();

        // Expects
        $this->assertInstanceOf(expected: Cli::class, actual: $result);
    }

    /**
     * @throws Exception
     */
    public function testRunRequest(): void
    {
        // Given
        $class = $this->getClass();
        $handler = $this->createMock(type: Request::class);
        $response = $this->createMock(type: Response::class);

        // Then
        $response
            ->expects($this->once())
            ->method(constraint: 'render')
        ;
        $handler
            ->expects($this->once())
            ->method(constraint: 'process')
            ->willReturn($response)
        ;

        // When
        $class->run(handler: $handler);
    }

    /**
     * @throws Exception
     */
    public function testRunCli(): void
    {
        // Given
        $class = $this->getClass();
        $handler = $this->createMock(type: Cli::class);
        $response = $this->createMock(type: Response::class);

        // Then
        $response
            ->expects($this->once())
            ->method(constraint: 'render')
        ;
        $handler
            ->expects($this->once())
            ->method(constraint: 'process')
            ->willReturn($response)
        ;

        // When
        $class->run(handler: $handler);
    }

    private function getClass(): Kernel
    {
        return new Kernel();
    }
}