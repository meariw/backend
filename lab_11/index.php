<?php

spl_autoload_register(function (string $class) {
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

$routes = require __DIR__ . '/src/routes.php';

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

foreach ($routes as $pattern => [$controllerClass, $action]) {
    if (preg_match($pattern, $uri, $matches)) {
        array_shift($matches);
        $controller = new $controllerClass();
        call_user_func_array([$controller, $action], $matches);
        exit;
    }
}

http_response_code(404);
echo '404 Not Found';
