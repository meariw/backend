<?php

class Cat
{
    private string $name;
    private string $color;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function sayHello(): string
    {
        return 'Меня зовут ' . $this->name . '. Я ' . $this->color . ' кошка.';
    }
}

$cat = new Cat('Мурка', 'серая');
echo $cat->sayHello() . '<br>';
echo $cat->getColor() . '<br>';