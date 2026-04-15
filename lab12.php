<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 12
// Тема: Обработка исключений и работа с датами
// Выполнил: Топчий
// ============================================================================

echo "<h1>Лабораторная работа 12</h1>";
echo "<h2>Обработка исключений и работа с датами</h2>";
echo "<hr>";

// ============================================================================
// ЧАСТЬ 1: ОБРАБОТКА ИСКЛЮЧЕНИЙ
// ============================================================================
echo "<h2>ЧАСТЬ 1: Обработка исключений (Exception Handling)</h2>";
echo "<hr>";

// ЗАДАНИЕ 1: Обработчик ошибки открытия несуществующего файла
echo "<h3>Задание 1: Обработка ошибки открытия несуществующего файла</h3>";

try {
    $file = fopen("nonexistent_file.txt", "r");
    if (!$file) {
        throw new Exception("Не удалось открыть файл: файл не существует");
    }
    fclose($file);
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Исключение: " . $e->getMessage() . "</p>";
    echo "<p>Код ошибки: " . $e->getCode() . "</p>";
    echo "<p>Файл: " . $e->getFile() . "</p>";
    echo "<p>Строка: " . $e->getLine() . "</p>";
}
echo "<br>";

// ЗАДАНИЕ 2: Обработчик исключения для деления на ноль с записью в log.txt
echo "<h3>Задание 2: Обработка деления на ноль с записью в log.txt</h3>";

function divide($a, $b) {
    try {
        if ($b == 0) {
            throw new Exception("Деление на ноль невозможно!");
        }
        return $a / $b;
    } catch (Exception $e) {
        $logMessage = date('Y-m-d H:i:s') . " - Ошибка: " . $e->getMessage() . "\n";
        file_put_contents('lab11_files/log.txt', $logMessage, FILE_APPEND);
        return "<p style='color: red;'>✗ Исключение: " . $e->getMessage() . " (записано в log.txt)</p>";
    }
}

echo divide(10, 2) . "<br>";
echo divide(10, 0) . "<br>";
echo "<p style='color: green;'>✓ Проверьте файл log.txt для просмотра записанных ошибок</p>";
echo "<br>";

// ЗАДАНИЕ 3: Обработчик исключения для доступа к несуществующему элементу массива
echo "<h3>Задание 3: Обработка доступа к несуществующему элементу массива</h3>";

$countries = array(
    'Spain' => 'Madrid',
    'Russia' => 'Moscow',
    'France' => 'Paris',
    'Germany' => 'Berlin'
);

function getCountryCapital($countries, $country) {
    try {
        if (!array_key_exists($country, $countries)) {
            throw new Exception("Страна '$country' не найдена в массиве!");
        }
        return $countries[$country];
    } catch (Exception $e) {
        return "<p style='color: red;'>✗ Исключение: " . $e->getMessage() . "</p>";
    }
}

echo "Spain: " . getCountryCapital($countries, 'Spain') . "<br>";
echo "Germany: " . getCountryCapital($countries, 'Germany') . "<br>";
echo "Italy: " . getCountryCapital($countries, 'Italy') . "<br>";
echo "USA: " . getCountryCapital($countries, 'USA') . "<br>";
echo "<br>";

// ============================================================================
// ЧАСТЬ 2: РАБОТА С ДАТАМИ И ВРЕМЕНЕМ
// ============================================================================
echo "<h2>ЧАСТЬ 2: Работа с датами и временем</h2>";
echo "<hr>";

// ЗАДАНИЕ 1: Вывести 15 марта 2025 года, 10:25:00 в формате timestamp
echo "<h3>Задание 1: Timestamp для 15 марта 2025, 10:25:00</h3>";

$timestamp1 = mktime(10, 25, 0, 3, 15, 2025);
echo "<p>mktime(10, 25, 0, 3, 15, 2025) = <strong>$timestamp1</strong></p>";
echo "<p>Проверка: " . date('d.m.Y H:i:s', $timestamp1) . "</p>";
echo "<br>";

// ЗАДАНИЕ 2: Разница между 2 октября 1990, 08:05:59 и текущим временем
echo "<h3>Задание 2: Разница между 2 октября 1990 и текущим моментом</h3>";

$pastTime = mktime(8, 5, 59, 10, 2, 1990);
$currentTime = time();
$difference = $currentTime - $pastTime;

echo "<p>2 октября 1990, 08:05:59 в timestamp: $pastTime</p>";
echo "<p>Текущее время в timestamp: $currentTime</p>";
echo "<p>Разница в секундах: <strong>" . number_format($difference) . " сек.</strong></p>";
echo "<p>Разница в минутах: <strong>" . number_format($difference / 60, 2) . " мин.</strong></p>";
echo "<p>Разница в часах: <strong>" . number_format($difference / 3600, 2) . " час.</strong></p>";
echo "<p>Разница в днях: <strong>" . number_format($difference / 86400, 2) . " дн.</strong></p>";
echo "<p>Разница в годах: <strong>" . number_format($difference / (86400 * 365.25), 2) . " лет</strong></p>";
echo "<br>";

// ЗАДАНИЕ 3: Текущая дата-время в формате 'Год.месяц.день Час:Минута:Секунда'
echo "<h3>Задание 3: Текущая дата-время в заданном формате</h3>";

$currentDate = date('Y.m.d H:i:s');
echo "<p>Текущая дата и время: <strong>$currentDate</strong></p>";
echo "<br>";

// ЗАДАНИЕ 4: 1-е сентября текущего года в формате 'Год.месяц.день'
echo "<h3>Задание 4: 1 сентября текущего года</h3>";

$currentYear = date('Y');
$septemberFirst = mktime(0, 0, 0, 9, 1, $currentYear);
echo "<p>1 сентября $currentYear года: <strong>" . date('Y.m.d', $septemberFirst) . "</strong></p>";
echo "<br>";

// ЗАДАНИЕ 5: Какой день недели был 2 февраля 2000 года
echo "<h3>Задание 5: День недели 2 февраля 2000 года</h3>";

$feb2_2000 = mktime(0, 0, 0, 2, 2, 2000);
$dayOfWeek = date('w', $feb2_2000);
$daysOfWeek = array(
    0 => 'Воскресенье',
    1 => 'Понедельник',
    2 => 'Вторник',
    3 => 'Среда',
    4 => 'Четверг',
    5 => 'Пятница',
    6 => 'Суббота'
);

echo "<p>2 февраля 2000 года: <strong>" . $daysOfWeek[$dayOfWeek] . "</strong></p>";
echo "<p>Проверка: " . date('d.m.Y (l)', $feb2_2000) . "</p>";
echo "<br>";

// ЗАДАНИЕ 6: Массив дней недели и определение текущего дня
echo "<h3>Задание 6: Массив дней недели и определение текущего дня</h3>";

$week = array(
    'Monday' => 'Понедельник',
    'Tuesday' => 'Вторник',
    'Wednesday' => 'Среда',
    'Thursday' => 'Четверг',
    'Friday' => 'Пятница',
    'Saturday' => 'Суббота',
    'Sunday' => 'Воскресенье'
);

$currentDayEng = date('l');
$currentDayName = $week[$currentDayEng];

echo "<p>Сегодня: <strong>$currentDayName</strong> ($currentDayEng)</p>";

// Определяем день недели для 12.06.2016
$birthday = mktime(0, 0, 0, 6, 12, 2016);
$birthdayDayEng = date('l', $birthday);
$birthdayDayName = $week[$birthdayDayEng];

echo "<p>12 июня 2016 года (день рождения): <strong>$birthdayDayName</strong> ($birthdayDayEng)</p>";
echo "<p>Дата: " . date('d.m.Y', $birthday) . "</p>";
echo "<br>";

// ЗАДАНИЕ 7: Форма для сравнения двух дат
echo "<h3>Задание 7: Сравнение двух дат</h3>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date1'], $_POST['date2'])) {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    
    $timestamp1 = strtotime($date1);
    $timestamp2 = strtotime($date2);
    
    echo "<form method='POST' style='background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
    echo "<label>Дата 1: <input type='date' name='date1' value='$date1' required></label><br>";
    echo "<label>Дата 2: <input type='date' name='date2' value='$date2' required></label><br>";
    echo "<button type='submit'>Сравнить</button>";
    echo "</form>";
    
    if ($timestamp1 > $timestamp2) {
        echo "<p style='color: green;'>✓ Большая дата: <strong>$date1</strong></p>";
        echo "<p>Разница: " . number_format(abs($timestamp1 - $timestamp2) / 86400, 0) . " дн.</p>";
    } elseif ($timestamp2 > $timestamp1) {
        echo "<p style='color: green;'>✓ Большая дата: <strong>$date2</strong></p>";
        echo "<p>Разница: " . number_format(abs($timestamp2 - $timestamp1) / 86400, 0) . " дн.</p>";
    } else {
        echo "<p style='color: blue;'>✓ Даты равны: <strong>$date1</strong> = <strong>$date2</strong></p>";
    }
} else {
    echo "<form method='POST' style='background: #f5f5f5; padding: 15px; border-radius: 5px; margin: 10px 0;'>";
    echo "<label>Дата 1: <input type='date' name='date1' required></label><br>";
    echo "<label>Дата 2: <input type='date' name='date2' required></label><br>";
    echo "<button type='submit'>Сравнить даты</button>";
    echo "</form>";
}
echo "<br>";

// ЗАДАНИЕ 8: Преобразование даты из 'Год-месяц-день' в 'день-месяц-год'
echo "<h3>Задание 8: Преобразование формата даты</h3>";

$inputDate = '2025-12-31';
$timestamp = strtotime($inputDate);
$outputDate = date('d-m-Y', $timestamp);

echo "<p>Исходная дата: <strong>$inputDate</strong></p>";
echo "<p>Преобразованная дата: <strong>$outputDate</strong></p>";
echo "<br>";

// ЗАДАНИЕ 9: Манипуляции с датой (прибавление и вычитание)
echo "<h3>Задание 9: Прибавление и вычитание дат</h3>";

$date = '2000.02.03';
echo "<p>Исходная дата: <strong>$date</strong></p>";

// Преобразуем в формат Y-m-d для date_create
$dateFormatted = str_replace('.', '-', $date);
$dateObj = date_create($dateFormatted);

echo "<p>1. Прибавляем 2 дня:</p>";
date_modify($dateObj, '+2 days');
echo "<p>   Результат: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";

echo "<p>2. Прибавляем 1 месяц:</p>";
date_modify($dateObj, '+1 month');
echo "<p>   Результат: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";

echo "<p>3. Прибавляем 3 дня:</p>";
date_modify($dateObj, '+3 days');
echo "<p>   Результат: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";

echo "<p>4. Прибавляем 1 год:</p>";
date_modify($dateObj, '+1 year');
echo "<p>   Результат: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";

echo "<p>5. Отнимаем 3 дня:</p>";
date_modify($dateObj, '-3 days');
echo "<p>   Результат: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";

echo "<p style='color: green;'>✓ Итоговая дата: <strong>" . date_format($dateObj, 'd.m.Y') . "</strong></p>";
echo "<br>";

// ЗАДАНИЕ 10: Сколько дней осталось до Нового Года
echo "<h3>Задание 10: Дней до Нового Года</h3>";

$currentYear = date('Y');
$newYear = mktime(0, 0, 0, 1, 1, $currentYear + 1);
$today = time();
$daysUntilNewYear = ($newYear - $today) / 86400;

echo "<p>Сегодня: " . date('d.m.Y') . "</p>";
echo "<p>Новый год: 01.01." . ($currentYear + 1) . "</p>";
echo "<p>До Нового Года осталось: <strong>" . floor($daysUntilNewYear) . " дн.</strong></p>";
echo "<p>Или: <strong>" . floor($daysUntilNewYear / 7) . " нед. и " . ($daysUntilNewYear % 7) . " дн.</strong></p>";
echo "<br>";

// ============================================================================
// ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ
// ============================================================================
echo "<h2>Дополнительная информация</h2>";
echo "<hr>";

echo "<h3>Полезные функции для работы с датами:</h3>";
echo "<ul>";
echo "<li><strong>time()</strong> - текущий timestamp</li>";
echo "<li><strong>mktime(h, m, s, month, day, year)</strong> - создать timestamp</li>";
echo "<li><strong>strtotime(string)</strong> - распарсить дату из строки</li>";
echo "<li><strong>date(format, timestamp)</strong> - форматировать дату</li>";
echo "<li><strong>date_create(date)</strong> - создать объект даты</li>";
echo "<li><strong>date_modify(obj, modify)</strong> - изменить дату</li>";
echo "<li><strong>date_format(obj, format)</strong> - вывести дату</li>";
echo "</ul>";

echo "<br>";
echo "<hr>";
echo "<p style='color: green;'><strong>Все задания лабораторной работы 12 выполнены!</strong></p>";
?>
