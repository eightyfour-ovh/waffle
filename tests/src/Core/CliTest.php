<?php declare(strict_types=1);

namespace EightyfourTests\Core;

use Eightyfour\Core\Cli;
use Eightyfour\Core\Response;
use PHPUnit\Framework\TestCase;

class CliTest extends TestCase
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

    private function getClass(): Cli
    {
        return new Cli();
    }
}