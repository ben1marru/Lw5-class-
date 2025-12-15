<?php
// class.php

// Подключение классов
require_once 'car.php';
require_once 'rectangle.php';
require_once 'animals.php';

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
            $car = new car("BMW", "X5", 2020, 50000);
            echo $car->getInfo() . "\n";
            echo "Введите расстояние для поездки (км): ";
            $distance = intval(trim(fgets(STDIN)));
            $car->drive($distance);
            echo "Обновленный пробег: " . $car->getMileage() . " км\n";
            break;
        case '2':
            // Работа с классом rectangle
            try {
                echo "Введите длину прямоугольника: ";
                $length = floatval(trim(fgets(STDIN)));
                echo "Введите ширину прямоугольника: ";
                $width = floatval(trim(fgets(STDIN)));
                $rect = new rectangle($length, $width);
                echo "Площадь: " . $rect->getArea() . "\n";
                echo "Периметр: " . $rect->getPerimeter() . "\n";
            } catch (InvalidArgumentException $e) {
                echo "Ошибка: " . $e->getMessage() . "\n";
            }
            break;
        case '3':
            // Работа с классами animals, Dog, Cat, Zoo
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