<?php declare(strict_types=1);

namespace App;

use Eightyfour\Attribute\Configuration;

#[Configuration(
    controller: 'app/Controller',
    service: 'app/Service',
    securityLevel: 10,
)]
class Config extends Configuration
{

}