<?php
namespace MyApp;

class Animal
{
    protected $name;
    protected $age;
    protected $species;

    public function __construct(string $name, int $age, string $species)
    {
        $this->name = $name;
        $this->age = $age;
        $this->species = $species;
    }

    public function makeSound(): void
    {
        echo "Животное издает звук\n";
    }

    public function getInfo(): string
    {
        return "Имя: {$this->name}, вид: {$this->species}, возраст: {$this->age}";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}