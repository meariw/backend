<?php

namespace Controllers;

class BlogController
{
    public function index(): void
    {
        include __DIR__ . '/../../views/index.php';
    }

    public function aboutMe(): void
    {
        include __DIR__ . '/../../views/about.php';
    }

    public function sayHello(string $name): void
    {
        $name = urldecode($name);
        echo "Привет, $name";
    }

    public function sayBye(string $name): void
    {
        $name = urldecode($name);
        echo "Пока, $name";
    }
}
