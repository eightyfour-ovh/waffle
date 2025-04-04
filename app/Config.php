<?php declare(strict_types=1);

namespace App;

use Eightyfour\Attribute\Configuration;

#[Configuration(
    controller: 'app/Controller',
    service: 'app/Service',
)]
class Config extends Configuration
{

}