<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 13
// Тема: Объекты в PHP
// Выполнил: Топчий
// ============================================================================

echo "<h1>Лабораторная работа 13</h1>";
echo "<h2>Объекты в PHP</h2>";
echo "<hr>";

// ============================================================================
// ЗАДАНИЕ 1: Создание класса Worker с свойствами
// ============================================================================
echo "<h2>Задание 1: Создание класса Worker</h2>";

class Worker {
    // Свойства класса
    public $name;
    public $age;
    public $salary;
    
    // Конструктор для инициализации свойств
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

// Создаём 2 объекта класса Worker
$worker1 = new Worker("Александр", 25, 50000);
$worker2 = new Worker("Мария", 30, 65000);

echo "<p>✅ Созданы два объекта класса Worker:</p>";
echo "<ul>";
echo "<li>Работник 1: {$worker1->name}, {$worker1->age} лет, зарплата: {$worker1->salary} руб.</li>";
echo "<li>Работник 2: {$worker2->name}, {$worker2->age} лет, зарплата: {$worker2->salary} руб.</li>";
echo "</ul><br>";

// ============================================================================
// ЗАДАНИЕ 2: Вывод суммы зарплат и суммы возрастов
// ============================================================================
echo "<h2>Задание 2: Сумма зарплат и возрастов</h2>";

$totalSalary = $worker1->salary + $worker2->salary;
$totalAge = $worker1->age + $worker2->age;

echo "<p>Сумма зарплат: <strong>$totalSalary руб.</strong></p>";
echo "<p>Сумма возрастов: <strong>$totalAge лет</strong></p><br>";

// ============================================================================
// ЗАДАНИЕ 3-5: Методы getName(), getAge(), getSalary()
// ============================================================================
echo "<h2>Задания 3-5: Методы доступа к свойствам</h2>";

// Обновляем класс с методами
class WorkerWithMethods {
    public $name;
    public $age;
    public $salary;
    
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    
    // Задание 3: метод getName()
    public function getName() {
        return $this->name;
    }
    
    // Задание 4: метод getAge()
    public function getAge() {
        return $this->age;
    }
    
    // Задание 5: метод getSalary()
    public function getSalary() {
        return $this->salary;
    }
}

$emp1 = new WorkerWithMethods("Иван", 28, 45000);
$emp2 = new WorkerWithMethods("Елена", 35, 70000);

echo "<p>Работник 1:</p>";
echo "<ul>";
echo "<li>Имя (getName): " . $emp1->getName() . "</li>";
echo "<li>Возраст (getAge): " . $emp1->getAge() . " лет</li>";
echo "<li>Зарплата (getSalary): " . $emp1->getSalary() . " руб.</li>";
echo "</ul>";

echo "<p>Работник 2:</p>";
echo "<ul>";
echo "<li>Имя (getName): " . $emp2->getName() . "</li>";
echo "<li>Возраст (getAge): " . $emp2->getAge() . " лет</li>";
echo "<li>Зарплата (getSalary): " . $emp2->getSalary() . " руб.</li>";
echo "</ul><br>";

// ============================================================================
// ЗАДАНИЕ 6: getSalary() для суммы зарплат
// ============================================================================
echo "<h2>Задание 6: Метод для суммы зарплат</h2>";

class WorkerWithSum {
    public $name;
    public $age;
    public $salary;
    
    // Статическое свойство для хранения всех объектов
    private static $workers = [];
    
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        // Добавляем объект в массив всех работников
        self::$workers[] = $this;
    }
    
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getSalary() { return $this->salary; }
    
    // Статический метод для получения суммы всех зарплат
    public static function getTotalSalary() {
        $sum = 0;
        foreach (self::$workers as $worker) {
            $sum += $worker->salary;
        }
        return $sum;
    }
}

$w1 = new WorkerWithSum("Олег", 32, 55000);
$w2 = new WorkerWithSum("Анна", 27, 48000);
$w3 = new WorkerWithSum("Дмитрий", 41, 82000);

echo "<p>Сумма зарплат всех работников: <strong>" . WorkerWithSum::getTotalSalary() . " руб.</strong></p><br>";

// ============================================================================
// ЗАДАНИЕ 7-8: setAge() с проверкой возраста >= 18
// ============================================================================
echo "<h2>Задания 7-8: Метод setAge() с валидацией</h2>";

class WorkerWithSetAge {
    public $name;
    private $age;  // Скрытое свойство
    public $salary;
    
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->setAge($age);  // Используем setter для валидации
        $this->salary = $salary;
    }
    
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getSalary() { return $this->salary; }
    
    // Задание 7-8: setAge с проверкой
    public function setAge($newAge) {
        if ($newAge >= 18) {
            $this->age = $newAge;
            echo "<p style='color: green;'>✓ Возраст установлен: $newAge лет</p>";
        } else {
            echo "<p style='color: red;'>✗ Вам работать в нашей компании еще рано (возраст: $newAge)</p>";
        }
    }
}

echo "<p>Тестирование setAge():</p>";
$testWorker = new WorkerWithSetAge("Тест", 20, 30000);
echo "<p>Попытка установить возраст 15:</p>";
$testWorker->setAge(15);
echo "<p>Попытка установить возраст 25:</p>";
$testWorker->setAge(25);
echo "<p>Текущий возраст: <strong>" . $testWorker->getAge() . " лет</strong></p><br>";

// ============================================================================
// ЗАДАНИЕ 9: Метод checkAge()
// ============================================================================
echo "<h2>Задание 9: Метод checkAge()</h2>";

class WorkerWithCheckAge {
    public $name;
    private $age;
    public $salary;
    
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getSalary() { return $this->salary; }
    
    // Задание 9: публичный метод checkAge()
    public function checkAge() {
        return $this->age >= 18;
    }
}

$checkWorker1 = new WorkerWithCheckAge("Сергей", 17, 25000);
$checkWorker2 = new WorkerWithCheckAge("Ольга", 22, 40000);

echo "<p>{$checkWorker1->getName()}: возраст >= 18? " . 
     ($checkWorker1->checkAge() ? "✅ Да" : "❌ Нет") . "</p>";
echo "<p>{$checkWorker2->getName()}: возраст >= 18? " . 
     ($checkWorker2->checkAge() ? "✅ Да" : "❌ Нет") . "</p><br>";

// ============================================================================
// ЗАДАНИЕ 10: checkAge() private + setAge() с использованием checkAge()
// ============================================================================
echo "<h2>Задание 10: checkAge() private + setAge() с валидацией</h2>";

class WorkerFinal {
    public $name;
    private $age;
    public $salary;
    
    public function __construct($name, $age, $salary) {
        $this->name = $name;
        $this->setAge($age);
        $this->salary = $salary;
    }
    
    public function getName() { return $this->name; }
    public function getAge() { return $this->age; }
    public function getSalary() { return $this->salary; }
    
    // Задание 10: ПРИВАТНЫЙ метод checkAge()
    private function checkAge($age) {
        return $age >= 18;
    }
    
    // Публичный setAge() использует приватный checkAge()
    public function setAge($newAge) {
        if ($this->checkAge($newAge)) {
            $this->age = $newAge;
            return true;
        } else {
            echo "<p style='color: red;'>✗ Вам работать в нашей компании еще рано (возраст: $newAge)</p>";
            return false;
        }
    }
}

echo "<p>Тестирование приватного checkAge() через setAge():</p>";
$finalWorker = new WorkerFinal("Максим", 19, 35000);

$testAges = [16, 18, 21, 17, 30];
foreach ($testAges as $testAge) {
    echo "<p>Установка возраста $testAge: ";
    $result = $finalWorker->setAge($testAge);
    echo $result ? "✅ Успешно" : "❌ Отклонено";
    echo "</p>";
}

echo "<p>Итоговый возраст: <strong>" . $finalWorker->getAge() . " лет</strong></p><br>";

// ============================================================================
// ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ
// ============================================================================
echo "<h2>Дополнительная информация об объектах</h2>";
echo "<hr>";

echo "<h3>Основные понятия:</h3>";
echo "<ul>";
echo "<li><strong>Класс</strong> — шаблон для создания объектов</li>";
echo "<li><strong>Объект</strong> — экземпляр класса, созданный через <code>new</code></li>";
echo "<li><strong>Свойства</strong> — переменные внутри класса (\$this->property)</li>";
echo "<li><strong>Методы</strong> — функции внутри класса</li>";
echo "<li><strong>Конструктор</strong> — метод __construct(), вызывается при создании объекта</li>";
echo "<li><strong>Инкапсуляция</strong> — сокрытие свойств через private/protected</li>";
echo "<li><strong>\$this</strong> — ссылка на текущий объект внутри класса</li>";
echo "</ul>";

echo "<h3>Модификаторы доступа:</h3>";
echo "<ul>";
echo "<li><strong>public</strong> — доступно из любого места</li>";
echo "<li><strong>private</strong> — доступно только внутри класса</li>";
echo "<li><strong>protected</strong> — доступно в классе и наследниках</li>";
echo "</ul>";

echo "<br>";
echo "<hr>";
echo "<p style='color: green;'><strong>Все 10 заданий лабораторной работы 13 выполнены!</strong></p>";
?>

