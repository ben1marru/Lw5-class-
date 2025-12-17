<?php
namespace MyApp;

class Cat extends Animal
{
    private string $color;

    public function __construct(string $name, int $age, string $color)
    {
        parent::__construct($name, $age, 'Кошка');
        $this->color = $color;
    }

    public function makeSound(): void
    {
        echo "Мяу!\n";
    }

    public function getColor(): string
    {
        return $this->color;
    }
}