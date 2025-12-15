<?php
// Animal.php
abstract class Animal {
    protected string $name;
    protected int $age;
    protected string $species;

    public function __construct(string $name, int $age, string $species) {
        $this->name = $name;
        $this->age = $age;
        $this->species = $species;
    }

    public function getInfo(): string {
        return "Имя: {$this->name}, вид: {$this->species}, возраст: {$this->age}";
    }

    public function makeSound(): void {
        echo "Животное издает звук\n";
    }
}

class Dog extends Animal {
    private string $breed;

    public function __construct(string $name, int $age, string $breed) {
        parent::__construct($name, $age, "Собака");
        $this->breed = $breed;
    }

    public function makeSound(): void {
        echo "Гав-гав!\n";
    }
}

class Cat extends Animal {
    private string $color;

    public function __construct(string $name, int $age, string $color) {
        parent::__construct($name, $age, "Кошка");
        $this->color = $color;
    }

    public function makeSound(): void {
        echo "Мяу!\n";
    }
}

class Zoo {
    private array $animals = [];

    public function addAnimal(Animal $animal): void {
        $this->animals[] = $animal;
    }

    public function listAnimals(): void {
        foreach ($this->animals as $animal) {
            echo $animal->getInfo() . "\n";
        }
    }

    public function animalSounds(): void {
        foreach ($this->animals as $animal) {
            $animal->makeSound();
        }
    }
}
?>