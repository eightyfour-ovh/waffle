<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Constant;
use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;

abstract class AbstractResponse
{
    /**
     * @var array<mixed>|null
     */
    private(set) ?array $data
        {
            set => $this->data = $value;
        }

    private(set) bool $cli
        {
            set => $this->cli = $value;
        }

    private(set) Cli|Request $request
        {
            set => $this->request = $value;
        }

    abstract public function __construct(Cli|Request $handler);

    public function build(Cli|Request $handler): void
    {
        $this->data = null;
        $this->cli = $handler->cli;
        $this->request = ($this->cli && $handler instanceof Cli) ? new Request(cli: true) : $handler;
    }

    public function render(): void
    {
        $json = json_encode(value: $this->data?: [
            "message" => "Welcome to Eightyfour!",
            "CLI" => $this->cli,
        ],flags: JSON_PRETTY_PRINT);
        if ($_ENV[Constant::APP_ENV] !== Constant::ENV_TEST) print_r($json);
    }
}