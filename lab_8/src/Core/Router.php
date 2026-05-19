<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, string $controller, string $action): void
    {
        $this->routes[] = [
            'path' => $path,
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function dispatch(string $uri): void
    {
        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\{(\w+)\}/', '([^/]+)', $route['path']);
            $pattern = '#^' . $pattern . '$#';

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);

                $controllerClass = 'Controllers\\' . $route['controller'];
                $controller = new $controllerClass();
                call_user_func_array([$controller, $route['action']], $matches);
                return;
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}
