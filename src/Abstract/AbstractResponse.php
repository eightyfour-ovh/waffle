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
            get => $this->cli;
            set => $this->cli = $value;
        }

    abstract public function __construct(Cli|Request $handler);

    public function build(Cli|Request $handler): void
    {
        // TODO: Implement build() method.
        $this->data = null;
        $this->cli = $handler->cli;
    }

    public function render(): void
    {
        // TODO: Implement render() method.
        $default = [
            "message" => "Welcome to Eightyfour!",
        ];
        $data = $this->data ?: $default;
        $json = json_encode(value: $data,flags: JSON_PRETTY_PRINT);
        if ($_ENV[Constant::APP_ENV] !== Constant::ENV_TEST) print_r($json);
    }
}