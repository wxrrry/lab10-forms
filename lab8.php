<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 8 - ПРАКТИЧЕСКИЕ ЗАДАНИЯ
// Выполнил: Топчий
// ============================================================================

echo "<h1>Лабораторная работа 8 - Практические задания</h1>";
echo "<hr>";

// ============================================================================
// ЗАДАНИЕ 1: Функция mul(a, b) - умножение двух чисел
// ============================================================================
echo "<h2>Задание 1: Функция mul(a, b)</h2>";

function mul($a, $b) {
    return $a * $b;
}

echo "mul(5, 3) = " . mul(5, 3) . "<br>";
echo "mul(7, 4) = " . mul(7, 4) . "<br>";
echo "mul(2.5, 4) = " . mul(2.5, 4) . "<br><br>";

// ============================================================================
// ЗАДАНИЕ 2: Функция mul(m, n, o) - два варианта реализации
// ============================================================================
echo "<h2>Задание 2: Функция mul(m, n, o) - передача функции как параметра</h2>";

// Вариант 1: mul с двумя числами и функцией
function mul_variant1($m, $n, $o) {
    return $o($m, $n);
}

// Вариант 2: mul с массивом аргументов и функцией
function mul_variant2($args, $operation) {
    return call_user_func_array($operation, $args);
}

// Создаем функции для операций
$add = function($a, $b) {
    return $a + $b;
};

$multiply = function($a, $b) {
    return $a * $b;
};

$subtract = function($a, $b) {
    return $a - $b;
};

$divide = function($a, $b) {
    return $b != 0 ? $a / $b : 0;
};

echo "<strong>Вариант 1 (передача двух чисел):</strong><br>";
echo "mul_variant1(10, 5, add) = " . mul_variant1(10, 5, $add) . "<br>";
echo "mul_variant1(10, 5, multiply) = " . mul_variant1(10, 5, $multiply) . "<br>";
echo "mul_variant1(10, 5, subtract) = " . mul_variant1(10, 5, $subtract) . "<br>";
echo "mul_variant1(10, 5, divide) = " . mul_variant1(10, 5, $divide) . "<br><br>";

echo "<strong>Вариант 2 (передача массива аргументов):</strong><br>";
echo "mul_variant2([10, 5], add) = " . mul_variant2([10, 5], $add) . "<br>";
echo "mul_variant2([10, 5], multiply) = " . mul_variant2([10, 5], $multiply) . "<br>";
echo "mul_variant2([10, 5], subtract) = " . mul_variant2([10, 5], $subtract) . "<br>";
echo "mul_variant2([10, 5], divide) = " . mul_variant2([10, 5], $divide) . "<br><br>";

// ============================================================================
// ЗАДАНИЕ 3: Функция array_map_f(m, o) - аналог array_map
// ============================================================================
echo "<h2>Задание 3: Функция array_map_f(m, o)</h2>";

function array_map_f($m, $o) {
    $result = [];
    foreach ($m as $item) {
        $result[] = $o($item);
    }
    return $result;
}

// Примеры использования
$numbers = [1, 4, 9, 16, 25];

// Квадратный корень
$sqrt_result = array_map_f($numbers, 'sqrt');
echo "Исходный массив: " . implode(', ', $numbers) . "<br>";
echo "Квадратный корень: " . implode(', ', $sqrt_result) . "<br>";

// Умножение на 2
$double = function($x) {
    return $x * 2;
};
$double_result = array_map_f($numbers, $double);
echo "Умножение на 2: " . implode(', ', $double_result) . "<br>";

// Возведение в квадрат
$square = function($x) {
    return $x * $x;
};
$square_result = array_map_f($numbers, $square);
echo "Возведение в квадрат: " . implode(', ', $square_result) . "<br><br>";

// Сравнение с встроенным array_map
echo "<strong>Сравнение с встроенным array_map:</strong><br>";
$builtin_result = array_map('sqrt', $numbers);
echo "array_map('sqrt', numbers): " . implode(', ', $builtin_result) . "<br><br>";

// ============================================================================
// ЗАДАНИЕ 4: Проверка длины пароля
// ============================================================================
echo "<h2>Задание 4: Проверка длины пароля</h2>";

function checkPassword($password) {
    $length = strlen($password);
    
    if ($length > 5 && $length < 10) {
        return "Пароль подходит (длина: $length символов)";
    } else {
        return "Нужно придумать другой пароль (длина: $length символов)";
    }
}

$passwords = ['123456', '1234', '123456789', 'abcdef', '12345678'];

foreach ($passwords as $pwd) {
    echo "Пароль '$pwd': " . checkPassword($pwd) . "<br>";
}
echo "<br>";

// ============================================================================
// ЗАДАНИЕ 5: Проверка начала строки (http:// или https://)
// ============================================================================
echo "<h2>Задание 5: Проверка начала строки (http:// или https://)</h2>";

function checkHttpStart($str) {
    if (strpos($str, 'http://') === 0 || strpos($str, 'https://') === 0) {
        return "да";
    } else {
        return "нет";
    }
}

$urls = [
    'http://example.com',
    'https://google.com',
    'ftp://files.com',
    'www.site.com',
    'http://topchiy.com'
];

foreach ($urls as $url) {
    echo "'$url' - " . checkHttpStart($url) . "<br>";
}
echo "<br>";

// ============================================================================
// ЗАДАНИЕ 6: Проверка окончания строки (.jpg или .jpeg)
// ============================================================================
echo "<h2>Задание 6: Проверка окончания строки (.jpg или .jpeg)</h2>";

function checkImageExtension($str) {
    $length = strlen($str);
    
    if (substr($str, -4) === '.jpg' || substr($str, -5) === '.jpeg') {
        return "да";
    } else {
        return "нет";
    }
}

// Альтернативный вариант с substr_compare
function checkImageExtension2($str) {
    if (substr_compare($str, '.jpg', -4) === 0 || substr_compare($str, '.jpeg', -5) === 0) {
        return "да";
    }
    return "нет";
}

$files = [
    'photo.jpg',
    'image.jpeg',
    'document.pdf',
    'picture.png',
    'avatar.jpg',
    'photo.jpeg'
];

foreach ($files as $file) {
    echo "'$file' - " . checkImageExtension($file) . "<br>";
}
echo "<br>";

// ============================================================================
// ЗАДАНИЕ 7: Замена точек на дефисы в дате
// ============================================================================
echo "<h2>Задание 7: Замена точек на дефисы в дате</h2>";

$dateString = '16.04.2021';
echo "Исходная строка: $dateString<br>";

// Способ 1: str_replace
$result1 = str_replace('.', '-', $dateString);
echo "Способ 1 (str_replace): $result1<br>";

// Способ 2: strtr
$result2 = strtr($dateString, '.', '-');
echo "Способ 2 (strtr): $result2<br>";

// Способ 3: preg_replace
$result3 = preg_replace('/\./', '-', $dateString);
echo "Способ 3 (preg_replace): $result3<br><br>";

// ============================================================================
// ЗАДАНИЕ 8: Разбиение строки на массив с помощью explode
// ============================================================================
echo "<h2>Задание 8: Разбиение строки на массив (explode)</h2>";

$techString = 'html css php';
echo "Исходная строка: '$techString'<br>";

$techArray = explode(' ', $techString);
echo "Результат explode:<br>";
echo "<pre>";
print_r($techArray);
echo "</pre>";

echo "Элементы массива:<br>";
foreach ($techArray as $index => $value) {
    echo "[$index] => '$value'<br>";
}
echo "<br>";

// ============================================================================
// ЗАДАНИЕ 9: Объединение массива в строку с помощью implode
// ============================================================================
echo "<h2>Задание 9: Объединение массива в строку (implode)</h2>";

$techArray2 = array('html', 'css', 'php');
echo "Исходный массив: ";
print_r($techArray2);

// Объединение с запятой
$result_comma = implode(', ', $techArray2);
echo "implode(', ', array) = '$result_comma'<br>";

// Объединение с дефисом
$result_dash = implode('-', $techArray2);
echo "implode('-', array) = '$result_dash'<br>";

// Объединение с пробелом
$result_space = implode(' ', $techArray2);
echo "implode(' ', array) = '$result_space'<br>";

// Объединение без разделителя
$result_none = implode('', $techArray2);
echo "implode('', array) = '$result_none'<br><br>";

// ============================================================================
// ДОПОЛНИТЕЛЬНЫЕ ПРИМЕРЫ С ARRAY_MAP
// ============================================================================
echo "<h2>Дополнительные примеры с array_map</h2>";

// Пример 1: Преобразование регистра строк
$words = ['привет', 'МИР', 'Php', 'ARRAY_MAP'];
$uppercase = array_map('strtoupper', $words);
$lowercase = array_map('strtolower', $words);
$ucfirst = array_map('ucfirst', $words);

echo "Исходный массив: " . implode(', ', $words) . "<br>";
echo "В верхнем регистре: " . implode(', ', $uppercase) . "<br>";
echo "В нижнем регистре: " . implode(', ', $lowercase) . "<br>";
echo "С заглавной буквы: " . implode(', ', $ucfirst) . "<br><br>";

// Пример 2: Математические операции с массивом
$numbers2 = [1, 2, 3, 4, 5];
$squared = array_map(fn($n) => $n * $n, $numbers2);
$cubed = array_map(fn($n) => $n * $n * $n, $numbers2);

echo "Числа: " . implode(', ', $numbers2) . "<br>";
echo "Квадраты: " . implode(', ', $squared) . "<br>";
echo "Кубы: " . implode(', ', $cubed) . "<br><br>";

// Пример 3: Работа с несколькими массивами
$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$summed = array_map(fn($a, $b) => $a + $b, $arr1, $arr2);
$multiplied = array_map(fn($a, $b) => $a * $b, $arr1, $arr2);

echo "Массив 1: " . implode(', ', $arr1) . "<br>";
echo "Массив 2: " . implode(', ', $arr2) . "<br>";
echo "Сумма: " . implode(', ', $summed) . "<br>";
echo "Произведение: " . implode(', ', $multiplied) . "<br><br>";

echo "<hr>";
echo "<p style='color: green;'><strong>Все задания лабораторной работы 8 выполнены!</strong></p>";
?>
