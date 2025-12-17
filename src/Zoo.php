<?php

namespace MyApp;

class Zoo
{
    private array $animals = [];

    public function addAnimal(Animal $animal): void
    {
        $this->animals[] = $animal;
    }

    public function listAnimals(): void
    {
        foreach ($this->animals as $animal) {
            echo $animal->getInfo() . "\n";
        }
    }

    public function animalSounds(): void
    {
        foreach ($this->animals as $animal) {
            $animal->makeSound();
        }
    }
}
