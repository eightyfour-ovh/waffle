<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\TestService;
use Eightyfour\Attribute\Route;
use Eightyfour\Core\BaseController;
use Eightyfour\Core\View;

#[Route(path: '/test', name: 'test')]
class TestController extends BaseController
{
    #[Route(path: '', name: 'index')]
    public function index(TestService $service): View
    {
        return new View(data: $service->getMyCustomTests());
    }

    #[Route(path: '/custom', name: 'custom')]
    public function custom(): View
    {
        return new View(data: ["custom data set"]);
    }
}