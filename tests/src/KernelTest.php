<?php declare(strict_types=1);

namespace EightyfourTests;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Core\Response;
use Eightyfour\Interface\ConfigInterface;
use Eightyfour\Kernel;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use ReflectionObject;

class KernelTest extends TestCase
{
    public function testBoot(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->boot();

        // Expects
        $this->assertInstanceOf(ConfigInterface::class, $result->config);
    }

    public function testConfigure(): void
    {
        // Given
        $class = $this->getClass()->boot();

        // When
        $result = $class->configure();

        // Expects
        $this->assertInstanceOf(ReflectionObject::class, $result->config);
    }

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
        $this->assertInstanceOf(Request::class, $result);
    }

    public function testCreateCli(): void
    {
        // Given
        $class = $this->getClass();

        // When
        $result = $class->createCliFromRequest();

        // Expects
        $this->assertInstanceOf(Cli::class, $result);
    }

    /**
     * @throws Exception
     */
    public function testRunRequest(): void
    {
        // Given
        $class = $this->getClass();
        $handler = $this->createMock(Request::class);
        $response = $this->createMock(Response::class);

        // Then
        $response
            ->expects($this->once())
            ->method('render')
        ;
        $handler
            ->expects($this->once())
            ->method('process')
            ->willReturn($response)
        ;

        // When
        $class->run($handler);
    }

    /**
     * @throws Exception
     */
    public function testRunCli(): void
    {
        // Given
        $class = $this->getClass();
        $handler = $this->createMock(Cli::class);
        $response = $this->createMock(Response::class);

        // Then
        $handler
            ->expects($this->once())
            ->method('process')
            ->willReturn($response)
        ;

        // When
        $class->run($handler);
    }

    private function getClass(): Kernel
    {
        return new Kernel();
    }
}