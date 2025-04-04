<?php

namespace App;

use Eightyfour\Attribute\Configuration;

#[Configuration(
    controller: 'app/Controller',
    service: 'app/Service',
)]
class Config extends Configuration
{

}