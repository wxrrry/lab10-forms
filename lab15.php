<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа 15</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'Helvetica Neue', sans-serif;
            background: #000;
            min-height: 100vh;
            width: 100vw;
            overflow-x: hidden;
            position: relative;
        }
        .bg-layer { position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 0; pointer-events: none; }
        .gradient-bg { position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: #000; }
        .gradient-blob { position: absolute; border-radius: 50%; filter: blur(80px); opacity: 0.7; animation: blobFloat 8s ease-in-out infinite; }
        .blob-1 { width: 600px; height: 600px; background: radial-gradient(circle, #8B2252 0%, #6B1D3E 50%, transparent 70%); top: 5%; left: -10%; animation-delay: 0s; }
        .blob-2 { width: 500px; height: 700px; background: radial-gradient(circle, #C4523A 0%, #8B3A2A 50%, transparent 70%); top: 20%; right: -15%; animation-delay: -2s; animation-duration: 10s; }
        .blob-3 { width: 560px; height: 560px; background: radial-gradient(circle, #7B2D4E 0%, #4A1A2E 50%, transparent 70%); top: 45%; left: 10%; animation-delay: -4s; animation-duration: 12s; }
        .blob-4 { width: 400px; height: 400px; background: radial-gradient(circle, #5B3D5E 0%, #2E1A35 50%, transparent 70%); bottom: 10%; right: 5%; animation-delay: -1s; animation-duration: 9s; }
        .blob-5 { width: 360px; height: 360px; background: radial-gradient(circle, #6B4226 0%, #3E2415 50%, transparent 70%); top: 70%; left: -5%; animation-delay: -3s; animation-duration: 11s; }
        .blob-6 { width: 440px; height: 440px; background: radial-gradient(circle, #9B3D5E 0%, #5E1A35 50%, transparent 70%); top: 10%; right: 20%; animation-delay: -5s; animation-duration: 7s; }
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -15px) scale(1.05); }
            50% { transform: translate(-10px, 20px) scale(0.95); }
            75% { transform: translate(15px, 10px) scale(1.02); }
        }
        .noise-overlay { position: absolute; top: 0; left: 0; right: 0; bottom: 0; opacity: 0.03; background-image: url("image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E"); background-repeat: repeat; background-size: 256px 256px; pointer-events: none; }
        .main-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            margin: 0 auto;
            padding: 48px 16px 32px 16px;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #fff;
            text-shadow: 0 2px 20px rgba(255,255,255,0.08);
        }
        hr { border: none; border-top: 1.5px solid rgba(255,255,255,0.12); margin: 24px 0; }
        ul, ol { color: #eee; margin-bottom: 18px; }
        li { margin-bottom: 4px; }
        p, li, strong { color: #f3f3f3; font-size: 1.08em; }
        .main-content ul { background: rgba(255,255,255,0.04); border-radius: 12px; padding: 12px 20px; }
        .main-content p { margin-bottom: 10px; }
        .main-content h1 { font-size: 2.5em; font-weight: 800; margin-bottom: 10px; }
        .main-content h2 { font-size: 1.5em; font-weight: 700; margin-top: 28px; margin-bottom: 10px; }
        .main-content h3 { font-size: 1.2em; font-weight: 600; margin-top: 18px; margin-bottom: 8px; }
        body::-webkit-scrollbar { width: 10px; background: #181818; }
        body::-webkit-scrollbar-thumb { background: #333; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="bg-layer">
        <div class="gradient-bg"></div>
        <div class="gradient-blob blob-1"></div>
        <div class="gradient-blob blob-2"></div>
        <div class="gradient-blob blob-3"></div>
        <div class="gradient-blob blob-4"></div>
        <div class="gradient-blob blob-5"></div>
        <div class="gradient-blob blob-6"></div>
        <div class="noise-overlay"></div>
    </div>
    <div class="main-content">
<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 15
// Тема: Абстрактные классы и интерфейсы
// Выполнил: Топчий
// ============================================================================

echo "<h1>Лабораторная работа 15</h1>";
echo "<h2>Абстрактные классы и интерфейсы</h2>";
echo "<hr>";

// ============================================================================
// ЗАДАНИЕ 1-2: Абстрактный класс Figure
// ============================================================================
echo "<h2>Задания 1-2: Абстрактный класс Figure с абстрактным методом infoAbout()</h2>";

abstract class Figure {
    protected $area;
    protected $color;
    protected $sidesCount;
    
    // Абстрактный метод infoAbout()
    abstract public function infoAbout();
    
    // Геттеры и сеттеры
    public function getArea() {
        return $this->area;
    }
    
    public function setArea($area) {
        $this->area = $area;
    }
    
    public function getColor() {
        return $this->color;
    }
    
    public function setColor($color) {
        $this->color = $color;
    }
    
    public function getSidesCount() {
        return $this->sidesCount;
    }
}

// ============================================================================
// ЗАДАНИЕ 3: Интерфейс для классов Rectangle, Triangle, Square
// ============================================================================
echo "<h2>Задание 3: Интерфейс ShapeInterface с методом getArea()</h2>";

interface ShapeInterface {
    public function getArea();
}

// ============================================================================
// ЗАДАНИЯ 4-8: Класс Rectangle
// ============================================================================
echo "<h2>Задания 4-8: Класс Rectangle</h2>";

class Rectangle extends Figure implements ShapeInterface {
    private $a; // длина стороны a
    private $b; // длина стороны b
    
    const SIDES_COUNT = 4;
    
    // Конструктор
    public function __construct($a, $b, $color = 'blue') {
        $this->a = $a;
        $this->b = $b;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
        $this->area = $this->getArea();
    }
    
    // Реализация метода getArea() из интерфейса
    public function getArea() {
        return $this->a * $this->b;
    }
    
    // Реализация абстрактного метода infoAbout()
    public function infoAbout() {
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны.";
    }
    
    // Геттеры для сторон
    public function getSideA() {
        return $this->a;
    }
    
    public function getSideB() {
        return $this->b;
    }
}

// ============================================================================
// ЗАДАНИЯ 4-5, 7-8: Класс Square
// ============================================================================
echo "<h2>Задания 4-5, 7-8: Класс Square</h2>";

class Square extends Figure implements ShapeInterface {
    private $a; // длина стороны
    
    const SIDES_COUNT = 4;
    
    // Конструктор
    public function __construct($a, $color = 'red') {
        $this->a = $a;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
        $this->area = $this->getArea();
    }
    
    // Реализация метода getArea() из интерфейса
    public function getArea() {
        return $this->a * $this->a;
    }
    
    // Реализация абстрактного метода infoAbout()
    public function infoAbout() {
        return "Это класс квадрата. У него {$this->sidesCount} стороны.";
    }
    
    // Геттер для стороны
    public function getSide() {
        return $this->a;
    }
}

// ============================================================================
// ЗАДАНИЯ 4, 6-8: Класс Triangle
// ============================================================================
echo "<h2>Задания 4, 6-8: Класс Triangle</h2>";

class Triangle extends Figure implements ShapeInterface {
    private $a; // длина стороны a
    private $b; // длина стороны b
    private $c; // длина стороны c
    
    const SIDES_COUNT = 3;
    
    // Конструктор
    public function __construct($a, $b, $c, $color = 'green') {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->color = $color;
        $this->sidesCount = self::SIDES_COUNT;
        $this->area = $this->getArea();
    }
    
    // Реализация метода getArea() из интерфейса (формула Герона)
    public function getArea() {
        // Полупериметр
        $p = ($this->a + $this->b + $this->c) / 2;
        // Формула Герона: S = √(p(p-a)(p-b)(p-c))
        return sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
    }
    
    // Реализация абстрактного метода infoAbout()
    public function infoAbout() {
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
    
    // Геттеры для сторон
    public function getSideA() {
        return $this->a;
    }
    
    public function getSideB() {
        return $this->b;
    }
    
    public function getSideC() {
        return $this->c;
    }
}

// ============================================================================
// ЗАДАНИЯ 9-12: Создание объектов и вызов методов
// ============================================================================
echo "<h2>Задания 9-12: Создание объектов и вызов методов</h2>";
echo "<hr>";

// Rectangle - 2 объекта
echo "<h3>Прямоугольники (Rectangle):</h3>";
$rect1 = new Rectangle(5, 3, 'синий');
$rect2 = new Rectangle(10, 7, 'зеленый');

echo "<p><strong>Прямоугольник 1:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $rect1->infoAbout() . "</li>";
echo "<li>Стороны: a={$rect1->getSideA()}, b={$rect1->getSideB()}</li>";
echo "<li>Цвет: {$rect1->getColor()}</li>";
echo "<li>Площадь (getArea): " . $rect1->getArea() . " кв.ед.</li>";
echo "</ul>";

echo "<p><strong>Прямоугольник 2:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $rect2->infoAbout() . "</li>";
echo "<li>Стороны: a={$rect2->getSideA()}, b={$rect2->getSideB()}</li>";
echo "<li>Цвет: {$rect2->getColor()}</li>";
echo "<li>Площадь (getArea): " . $rect2->getArea() . " кв.ед.</li>";
echo "</ul>";

// Square - 2 объекта
echo "<h3>Квадраты (Square):</h3>";
$square1 = new Square(4, 'красный');
$square2 = new Square(6, 'желтый');

echo "<p><strong>Квадрат 1:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $square1->infoAbout() . "</li>";
echo "<li>Сторона: {$square1->getSide()}</li>";
echo "<li>Цвет: {$square1->getColor()}</li>";
echo "<li>Площадь (getArea): " . $square1->getArea() . " кв.ед.</li>";
echo "</ul>";

echo "<p><strong>Квадрат 2:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $square2->infoAbout() . "</li>";
echo "<li>Сторона: {$square2->getSide()}</li>";
echo "<li>Цвет: {$square2->getColor()}</li>";
echo "<li>Площадь (getArea): " . $square2->getArea() . " кв.ед.</li>";
echo "</ul>";

// Triangle - 2 объекта
echo "<h3>Треугольники (Triangle):</h3>";
$triangle1 = new Triangle(3, 4, 5, 'оранжевый');
$triangle2 = new Triangle(6, 8, 10, 'фиолетовый');

echo "<p><strong>Треугольник 1:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $triangle1->infoAbout() . "</li>";
echo "<li>Стороны: a={$triangle1->getSideA()}, b={$triangle1->getSideB()}, c={$triangle1->getSideC()}</li>";
echo "<li>Цвет: {$triangle1->getColor()}</li>";
echo "<li>Площадь (getArea): " . round($triangle1->getArea(), 2) . " кв.ед.</li>";
echo "</ul>";

echo "<p><strong>Треугольник 2:</strong></p>";
echo "<ul>";
echo "<li>Инфо: " . $triangle2->infoAbout() . "</li>";
echo "<li>Стороны: a={$triangle2->getSideA()}, b={$triangle2->getSideB()}, c={$triangle2->getSideC()}</li>";
echo "<li>Цвет: {$triangle2->getColor()}</li>";
echo "<li>Площадь (getArea): " . round($triangle2->getArea(), 2) . " кв.ед.</li>";
echo "</ul>";

// ============================================================================
// ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ
// ============================================================================
echo "<h2>Дополнительная информация</h2>";
echo "<hr>";

echo "<h3>Основные понятия:</h3>";
echo "<ul>";
echo "<li><strong>Абстрактный класс</strong> — класс, который нельзя инстанцировать, предназначен только для наследования</li>";
echo "<li><strong>Абстрактный метод</strong> — метод без реализации, который должен быть реализован в потомках</li>";
echo "<li><strong>Интерфейс</strong> — контракт, описывающий методы, которые должен реализовать класс</li>";
echo "<li><strong>implements</strong> — ключевое слово для реализации интерфейса</li>";
echo "<li><strong>extends</strong> — ключевое слово для наследования класса</li>";
echo "<li><strong>const</strong> — константа класса (неизменяемое свойство)</li>";
echo "</ul>";

echo "<h3>Отличия абстрактных классов от интерфейсов:</h3>";
echo "<ul>";
echo "<li>Абстрактный класс может иметь свойства и реализованные методы</li>";
echo "<li>Интерфейс может содержать только объявления методов (без реализации)</li>";
echo "<li>Класс может наследовать только один абстрактный класс</li>";
echo "<li>Класс может реализовывать несколько интерфейсов</li>";
echo "</ul>";

echo "<br>";
echo "<hr>";
echo "<p style='color: green;'><strong>Все 12 заданий лабораторной работы 15 выполнены!</strong></p>";
?>
    </div>
</body>
</html>