<?php declare(strict_types=1);

namespace EightyfourTests;

use Eightyfour\Kernel;
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

    private function getClass(): Kernel
    {
        return new Kernel();
    }
}