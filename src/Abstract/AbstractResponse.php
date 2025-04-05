<?php declare(strict_types=1);

namespace Eightyfour\Abstract;

use Eightyfour\Core\Constant;
use Eightyfour\Core\Cli;
use Eightyfour\Core\Request;
use Eightyfour\Core\View;
use Eightyfour\Interface\CliInterface;
use Eightyfour\Interface\RequestInterface;
use Eightyfour\Interface\ResponseInterface;
use Eightyfour\Trait\ReflectionTrait;
use Eightyfour\Trait\RenderingTrait;

abstract class AbstractResponse implements ResponseInterface
{
    use ReflectionTrait;
    use RenderingTrait;

    /**
     * @var View|null
     */
    private(set) ?View $view
        {
            set => $this->view = $value;
        }

    private(set) bool $cli
        {
            set => $this->cli = $value;
        }

    private(set) Cli|Request $handler
        {
            set => $this->handler = $value;
        }

    abstract public function __construct(CliInterface|RequestInterface $handler);

    public function build(CliInterface|RequestInterface $handler): void
    {
        $this->view = null;
        /** @var Cli|Request $handler */
        $this->cli = $handler->cli;
        $this->handler = ($this->cli && $handler instanceof Cli) ? new Request(cli: true) : $handler;
    }

    public function render(): void
    {
        $class = $method = $cli = $error = null;
        $argTypes = $args = [];
        $controller = $this->controllerValues(route: $this->handler->currentRoute);
        /**
         * @var string|int $key
         * @var string|array<non-empty-string, string> $value
         */
        foreach ($controller as $key => $value) {
            match ($key) {
                Constant::CLASSNAME => $class = $value,
                Constant::METHOD => $method = $value,
                Constant::ARGUMENTS => $argTypes = $value,
                0 => $cli = true,
                default => $error = true,
            };
        }
        if ($cli !== true || $error === true) {
            $class = new $class;
            /** @var array<non-empty-string, string> $argTypes */
            foreach ($argTypes as $argType) {
                $arg = new $argType;
                $args[] = $arg;
            }
            /** @var callable $callable */
            $callable = [$class, $method];
            /** @var View $view */
            $view = call_user_func_array(callback: $callable, args: $args);
            $this->view = $view;
            /** @var string $env */
            $env = $this->handler->env[Constant::APP_ENV];
            $this->rendering(view: $view, env: $env);
        }
    }
}