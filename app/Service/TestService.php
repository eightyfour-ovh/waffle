<?php declare(strict_types=1);

namespace App\Service;

class TestService
{
    /**
     * @return string[]
     */
    public function getMyCustomTests(): array
    {
        return [
            "testKey" => "testValue",
        ];
    }
}