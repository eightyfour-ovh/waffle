<?php

namespace Eightyfour\Abstract;

use Eightyfour\Trait\DotenvTrait;

abstract class AbstractRequest
{
    use DotenvTrait;

    /**
     * @var array<mixed>
     */
    public array $globals
        {
            get => $GLOBALS;
        }

    /**
     * @var array<mixed>
     */
    public array $server
        {
            get => $_SERVER;
        }

    /**
     * @var array<mixed>
     */
    public array $get
        {
            get => $_GET;
        }

    /**
     * @var array<mixed>
     */
    public array $post
        {
            get => $_POST;
        }

    /**
     * @var array<mixed>
     */
    public array $files
        {
            get => $_FILES;
        }

    /**
     * @var array<mixed>
     */
    public array $cookie
        {
            get => $_COOKIE;
        }

    /**
     * @var array<mixed>
     */
    public array $session
        {
            get => $_SESSION;
        }

    /**
     * @var array<mixed>
     */
    public array $request
        {
            get => $_REQUEST;
        }

    /**
     * @var array<mixed>
     */
    public array $env
        {
            get => $_ENV;
        }

    abstract public function __construct();

    public function configure(): void
    {
        // TODO: Implement configure() method.
        $this->loadEnv();
    }

    public function process(): void
    {
        // TODO: Implement process() method.
    }
}