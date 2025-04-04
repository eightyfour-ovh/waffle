<?php declare(strict_types=1);

namespace Eightyfour\Core;

class Constant
{
    // Define App constants
    public const APP_ENV = 'APP_ENV';
    public const APP_DEBUG = 'APP_DEBUG';

    // Define defaults environments
    public const ENV_DEFAULT = self::ENV_PROD;
    public const ENV_DEV = 'dev';
    public const ENV_TEST = 'test';
    public const ENV_STAGING = 'staging';
    public const ENV_PROD = 'prod';

    // Define globals constants
    public const CURRENT_DIR = '.';
    public const PREVIOUS_DIR = '..';
    public const DEFAULT_DATA = [
        "message" => "Welcome to Eightyfour!",
    ];
    public const DEFAULT = 'default';
    public const PHPEXT = '.php';
    public const CLASSNAME = 'classname';
    public const CLI = 'cli';
    public const METHOD = 'method';
    public const ARGUMENTS = 'arguments';
    public const PATH = 'path';
    public const NAME = 'name';
    public const REQUEST_URI = 'REQUEST_URI';
}