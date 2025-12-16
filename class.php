<?php
require_once __DIR__ . '/vendor/autoload.php';

use MyApp\Car;
use MyApp\Rectangle;
use MyApp\Animal;
use MyApp\Dog;
use MyApp\Cat;
use MyApp\Zoo;

// Функции для каждой задачи
function taskCar() {
    $car = new Car("BMW", "X5", 2020, 50000);
    echo $car->getInfo() . "\n";
    $car->drive(150);
    echo "Обновленный пробег: " . $car->getMileage() . " км\n";
}

function taskRectangle() {
    $rectangle = new Rectangle(5.0, 3.0);
    echo "Площадь прямоугольника: " . $rectangle->getArea() . "\n";
    echo "Периметр прямоугольника: " . $rectangle->getPerimeter() . "\n";
}

function taskAnimals() {
    $dog1 = new Dog("Шерри", 3, "Лабрадор");
    $cat1 = new Cat("Мурка", 2, "серый");

    $zoo = new Zoo();
    $zoo->addAnimal($dog1);
    $zoo->addAnimal($cat1);

    echo "Животные в зоопарке:\n";
    $zoo->listAnimals();

    echo "Звуки животных:\n";
    $zoo->animalSounds();
}

// Главное меню
while (true) {
    echo "\nВыберите задачу:\n";
    echo "1. Работа с классом Car\n";
    echo "2. Работа с классом Rectangle\n";
    echo "3. Работа с животными и зоопарком\n";
    echo "4. Выйти\n";
    echo "Введите номер задачи: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            taskCar();
            break;
        case '2':
            taskRectangle();
            break;
        case '3':
            taskAnimals();
            break;
        case '4':
            echo "Выход...\n";
            exit;
        default:
            echo "Некорректный ввод. Попробуйте снова.\n";
    }
}
?>