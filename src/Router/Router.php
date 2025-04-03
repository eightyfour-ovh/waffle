<?php

namespace Eightyfour\Router;

use Eightyfour\Trait\ReflectionTrait;

class Router
{
    use ReflectionTrait;

    private(set) string|false $directory
        {
            set => $this->directory = $value;
        }

    /**
     * @var array<string, string>|false
     */
    private(set) array|false $files
        {
            set => $this->files = $value;
        }

    /**
     * @var array<string, array<string, string>>
     */
    private(set) array $routes
        {
            set => $this->routes = $value;
        }

    public function __construct(
        string|false $directory
    ) {
        $this->directory = $directory;
        $this->files = false;
    }

    public function boot(): self
    {
        // TODO: Implement boot() method.
        $this->routes = $this->files = [];
        if ($this->directory === false) {
            // TODO: Handle this error.
            return $this;
        }

        $this->files = $this->scan(directory: $this->directory);

        return $this;
    }

    /**
     * @param string $directory
     * @return array<string, string>
     */
    public function scan(string $directory): array
    {
        // TODO: Implement scan() method.
        $files = [];
        $paths = scandir(directory: $directory);
        if ($paths !== false) {
            foreach ($paths as $path) {
                if ($path === '.' || $path === '..') {
                    continue;
                }
                $file = $this->directory . DIRECTORY_SEPARATOR . $path;
                if (is_dir(filename: $file)) {
                    $files = array_merge($files, $this->scan(directory: $file));
                } else {
                    $files[$this->className(path: $file)] = $file;
                }
            }
        }

        return $files;
    }
}