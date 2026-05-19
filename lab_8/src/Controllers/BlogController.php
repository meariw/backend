<?php

namespace Controllers;

class BlogController
{
    private function render(string $view, string $title = 'Мой блог', array $vars = []): void
    {
        extract($vars);
        include __DIR__ . '/../../views/' . $view . '.php';
    }

    public function index(): void
    {
        $this->render('index');
    }

    public function aboutMe(): void
    {
        $this->render('about', 'Обо мне');
    }

    public function sayHello(string $name): void
    {
        $name = urldecode($name);
        $this->render('hello', 'Страница приветствия', ['name' => $name]);
    }

    public function sayBye(string $name): void
    {
        $name = urldecode($name);
        echo "Пока, $name";
    }
}