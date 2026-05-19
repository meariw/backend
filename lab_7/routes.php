<?php

use Core\Router;

$router = new Router();

$router->get('/', 'BlogController', 'index');
$router->get('/about-me', 'BlogController', 'aboutMe');
$router->get('/hello/{name}', 'BlogController', 'sayHello');
$router->get('/bye/{name}', 'BlogController', 'sayBye');

return $router;
