<?php

// 1) Класс Car
class Car {
    private string $brand;
    private string $model;
    private int $year;
    private int $mileage;

    // Конструктор
    public function __construct(string $brand, string $model, int $year, int $mileage) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->mileage = $mileage;
    }

    public function getInfo(): string {
        return "Машина: {$this->brand}, модель: {$this->model}, год: {$this->year}, пробег: {$this->mileage} км";
    }

    public function drive(int $distance): void {
        $this->mileage += $distance;
    }

    public function getMileage(): int {
        return $this->mileage;
    }
}

// 2) Класс Rectangle
class Rectangle {
    private float $length;
    private float $width;

    public function __construct(float $length, float $width) {
        if ($length < 0 || $width < 0) {
            throw new InvalidArgumentException("Длина и ширина не могут быть отрицательными");
        }
        $this->length = $length;
        $this->width = $width;
    }

    public function getArea(): float {
        return $this->length * $this->width;
    }

    public function getPerimeter(): float {
        return 2 * ($this->length + $this->width);
    }
}

// 3) Классы Animal, Dog, Cat, Zoo
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

// Запуск меню
while (true) {
    echo "Выберите действие:\n";
    echo "1. Работа с классом Car\n";
    echo "2. Работа с классом Rectangle\n";
    echo "3. Работа с классами Animal, Dog, Cat и Zoo\n";
    echo "0. Выйти\n";
    echo "Введите номер пункта: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            // Работа с классом Car
            $car = new Car("BMW", "X5", 2020, 50000);
            echo $car->getInfo() . "\n";
            echo "Введите расстояние для поездки (км): ";
            $distance = intval(trim(fgets(STDIN)));
            $car->drive($distance);
            echo "Обновленный пробег: " . $car->getMileage() . " км\n";
            break;
        case '2':
            // Работа с классом Rectangle
            try {
                echo "Введите длину прямоугольника: ";
                $length = floatval(trim(fgets(STDIN)));
                echo "Введите ширину прямоугольника: ";
                $width = floatval(trim(fgets(STDIN)));
                $rect = new Rectangle($length, $width);
                echo "Площадь: " . $rect->getArea() . "\n";
                echo "Периметр: " . $rect->getPerimeter() . "\n";
            } catch (InvalidArgumentException $e) {
                echo "Ошибка: " . $e->getMessage() . "\n";
            }
            break;
        case '3':
            // Работа с классами Animal, Dog, Cat, Zoo
            $dog1 = new Dog("Бенни", 3, "Лабрадор");
            $dog2 = new Dog("Лаки", 5, "Бульдог");
            $cat1 = new Cat("Мурка", 2, "Серый");
            $cat2 = new Cat("Пушинка", 4, "Белая");
            $zoo = new Zoo();
            $zoo->addAnimal($dog1);
            $zoo->addAnimal($dog2);
            $zoo->addAnimal($cat1);
            $zoo->addAnimal($cat2);
            echo "Список животных в зоопарке:\n";
            $zoo->listAnimals();

            echo "\nЗвуки животных:\n";
            $zoo->animalSounds();
            break;
        case '0':
            echo "Выход из программы.\n";
            exit;
        default:
            echo "Некорректный выбор. Попробуйте снова.\n";
    }
    echo "\n";
}
?>