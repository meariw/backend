<?php

namespace Controllers;

class BlogController
{
    public function index(): void
    {
        $title = 'Мой блог';
        include __DIR__ . '/../../views/index.php';
    }

    public function aboutMe(): void
    {
        $title = 'Обо мне';
        include __DIR__ . '/../../views/about.php';
    }

    public function sayHello(string $name): void
    {
        $title = 'Страница приветствия';
        $name = urldecode($name);
        include __DIR__ . '/../../views/hello.php';
    }
    public function sayBye(string $name): void
    {
        $name = urldecode($name);
        echo "Пока, $name";
    }
}