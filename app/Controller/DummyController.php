<?php

namespace App\Controller;

use Eightyfour\Attribute\Route;
use Eightyfour\Core\BaseController;
use Eightyfour\Core\View;

#[Route(path: '/', name: 'dummy')]
class DummyController extends BaseController
{
    #[Route(path: '', name: 'index')]
    public function index(): View
    {
        return new View(data: [
            "someKey" => "someValue",
            "anotherKey" => "anotherValue",
            "get" => "TODO: Implement GET method"
        ]);
    }
}