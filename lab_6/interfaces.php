<?php

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateSquare(): float
    {
        return M_PI * $this->radius ** 2;
    }
}

class Rectangle implements CalculateSquare
{
    private float $width;
    private float $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateSquare(): float
    {
        return $this->width * $this->height;
    }
}

class SomeOtherClass {}

function printSquare(object $obj): void
{
    if ($obj instanceof CalculateSquare) {
        echo 'Объект класса ' . get_class($obj) . '. Площадь: ' . $obj->calculateSquare() . '<br>';
    } else {
        echo 'Объект класса ' . get_class($obj) . ' не реализует интерфейс CalculateSquare.' . '<br>';
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$other = new SomeOtherClass();

printSquare($circle);
printSquare($rectangle);
printSquare($other);