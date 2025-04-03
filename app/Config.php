<?php

namespace App;

use Eightyfour\Attribute\Configuration;
use Eightyfour\Interface\ConfigInterface;

#[Configuration(
    controller: 'app/Controller',
    service: 'app/Service',
)]
class Config implements ConfigInterface
{

}