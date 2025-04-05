<?php

namespace Eightyfour\Trait;

use Eightyfour\Core\Constant;
use Eightyfour\Core\View;

trait RenderingTrait
{
    public function rendering(View $view, string $env): void
    {
        $json = json_encode(value: $view,flags: JSON_PRETTY_PRINT);
        if ($env !== Constant::ENV_TEST) print_r($json);
    }

    public function throw(View $view): void
    {
        $this->rendering(view: $view, env: Constant::ENV_EXCEPTION);
    }
}