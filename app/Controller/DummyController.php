<?php

namespace App\Controller;

use Eightyfour\Core\BaseController;
use Eightyfour\Router\Route;

#[Route(path: '/', name: 'dummy')]
class DummyController extends BaseController
{
    #[Route(path: '', name: 'index')]
    public function index(): void
    {
        // TODO: Implement index() method.
    }
}