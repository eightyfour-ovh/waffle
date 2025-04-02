<?php declare(strict_types=1);

namespace App;

use App\Config\App;
use Eightyfour\Kernel as Base;
class Kernel extends Base
{
    public function boot(): self
    {
        $this->config = new App();

        return $this;
    }
}