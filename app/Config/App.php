<?php

namespace App\Config;

use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\ConfigInterface;

#[Configuration(controller: 'app/Controller')]
class App implements ConfigInterface
{

}