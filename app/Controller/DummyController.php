<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\DummyService;
use Eightyfour\Attribute\Route;
use Eightyfour\Core\BaseController;
use Eightyfour\Core\View;

#[Route(path: '/', name: 'dummy')]
class DummyController extends BaseController
{
    #[Route(path: '', name: 'index')]
    public function index(DummyService $service): View
    {
        return new View(data: $service->getResults());
    }
}