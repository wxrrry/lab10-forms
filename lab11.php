<?php
// ============================================================================
// ЛАБОРАТОРНАЯ РАБОТА 11
// Тема: Работа с файлами в PHP
// Выполнил: Топчий
// ============================================================================

echo "<h1>Лабораторная работа 11</h1>";
echo "<h2>Работа с файлами и папками в PHP</h2>";
echo "<hr>";

// Базовая директория для работы с файлами
$baseDir = __DIR__ . '/lab11_files/';

// Создаем директорию для работы, если не существует
if (!file_exists($baseDir)) {
    mkdir($baseDir, 0777, true);
    echo "<p style='color: green;'>✓ Создана директория для работы: lab11_files/</p>";
}

// ============================================================================
// ЧАСТЬ 1: РАБОТА С ФАЙЛАМИ
// ============================================================================
echo "<h2>ЧАСТЬ 1: Работа с файлами</h2>";
echo "<hr>";

// ЗАДАНИЕ 1: Создание файла и запись в него
echo "<h3>Задание 1: Создание файла test.txt и запись текста</h3>";

$testFile = $baseDir . 'test.txt';
$file = fopen($testFile, 'w');
if ($file) {
    fwrite($file, 'Привет, мир!');
    fclose($file);
    echo "<p style='color: green;'>✓ Файл test.txt создан и записан текст 'Привет, мир!'</p>";
} else {
    echo "<p style='color: red;'>✗ Ошибка создания файла</p>";
}
echo "<br>";

// ЗАДАНИЕ 2: Чтение данных из файла
echo "<h3>Задание 2: Чтение данных из файла test.txt</h3>";

if (file_exists($testFile)) {
    $file = fopen($testFile, 'r');
    if ($file) {
        $content = '';
        while (!feof($file)) {
            $content .= fgets($file, 1024);
        }
        fclose($file);
        echo "<p>Содержимое файла: <strong>'$content'</strong></p>";
        echo "<p style='color: green;'>✓ Файл успешно прочитан</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Файл не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 3: Переименование файла
echo "<h3>Задание 3: Переименование test.txt в mir.txt</h3>";

$mirFile = $baseDir . 'mir.txt';
if (file_exists($testFile)) {
    if (rename($testFile, $mirFile)) {
        echo "<p style='color: green;'>✓ Файл успешно переименован из test.txt в mir.txt</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка переименования файла</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Исходный файл не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 4: Создание папки и перемещение файла
echo "<h3>Задание 4: Создание папки 'folder' и перемещение mir.txt</h3>";

$folderPath = $baseDir . 'folder/';
$mirInFolder = $folderPath . 'mir.txt';

if (!file_exists($folderPath)) {
    if (mkdir($folderPath, 0777, true)) {
        echo "<p style='color: green;'>✓ Папка 'folder' создана</p>";
    }
}

if (file_exists($mirFile)) {
    if (rename($mirFile, $mirInFolder)) {
        echo "<p style='color: green;'>✓ Файл mir.txt перемещен в папку folder/</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка перемещения файла</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Файл mir.txt не найден</p>";
}
echo "<br>";

// ЗАДАНИЕ 5: Создание копии файла
echo "<h3>Задание 5: Создание копии mir.txt с именем world.txt</h3>";

$worldFile = $folderPath . 'world.txt';

if (file_exists($mirInFolder)) {
    if (copy($mirInFolder, $worldFile)) {
        echo "<p style='color: green;'>✓ Создана копия файла: world.txt</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка копирования файла</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Исходный файл mir.txt не найден</p>";
}
echo "<br>";

// ЗАДАНИЕ 6: Определение размера файла
echo "<h3>Задание 6: Определение размера файла world.txt</h3>";

if (file_exists($worldFile)) {
    $sizeBytes = filesize($worldFile);
    $sizeKB = round($sizeBytes / 1024, 2);
    $sizeMB = round($sizeBytes / (1024 * 1024), 4);
    $sizeGB = round($sizeBytes / (1024 * 1024 * 1024), 6);
    
    echo "<p>Размер файла world.txt:</p>";
    echo "<ul>";
    echo "<li>В байтах: <strong>$sizeBytes байт</strong></li>";
    echo "<li>В килобайтах: <strong>$sizeKB KB</strong></li>";
    echo "<li>В мегабайтах: <strong>$sizeMB MB</strong></li>";
    echo "<li>В гигабайтах: <strong>$sizeGB GB</strong></li>";
    echo "</ul>";
    echo "<p style='color: green;'>✓ Размер файла определен</p>";
} else {
    echo "<p style='color: red;'>✗ Файл world.txt не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 7: Удаление файла
echo "<h3>Задание 7: Удаление файла world.txt</h3>";

if (file_exists($worldFile)) {
    if (unlink($worldFile)) {
        echo "<p style='color: green;'>✓ Файл world.txt успешно удален</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка удаления файла</p>";
    }
} else {
    echo "<p style='color: orange;'>! Файл world.txt уже не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 8: Проверка существования файлов
echo "<h3>Задание 8: Проверка существования файлов world.txt и mir.txt</h3>";

$worldExists = file_exists($worldFile);
$mirExists = file_exists($mirInFolder);

echo "<p>Файл world.txt: " . ($worldExists ? "<span style='color: green;'>✓ существует</span>" : "<span style='color: red;'>✗ не существует</span>") . "</p>";
echo "<p>Файл folder/mir.txt: " . ($mirExists ? "<span style='color: green;'>✓ существует</span>" : "<span style='color: red;'>✗ не существует</span>") . "</p>";
echo "<br>";

// ============================================================================
// ЧАСТЬ 2: РАБОТА С ПАПКАМИ
// ============================================================================
echo "<h2>ЧАСТЬ 2: Работа с папками</h2>";
echo "<hr>";

$testDir = $baseDir . 'test/';

// ЗАДАНИЕ 1: Создание папки 'test'
echo "<h3>Задание 1: Создание папки 'test'</h3>";

if (!file_exists($testDir)) {
    if (mkdir($testDir, 0777, true)) {
        echo "<p style='color: green;'>✓ Папка 'test' успешно создана</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка создания папки</p>";
    }
} else {
    echo "<p style='color: orange;'>! Папка 'test' уже существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 2: Переименование папки 'test' в 'www'
echo "<h3>Задание 2: Переименование папки 'test' в 'www'</h3>";

$wwwDir = $baseDir . 'www/';

if (file_exists($testDir)) {
    if (rename($testDir, $wwwDir)) {
        echo "<p style='color: green;'>✓ Папка успешно переименована из 'test' в 'www'</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка переименования папки</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Папка 'test' не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 3: Удаление папки 'www'
echo "<h3>Задание 3: Удаление папки 'www'</h3>";

if (file_exists($wwwDir)) {
    // Сначала удаляем все файлы в папке
    $files = scandir($wwwDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            unlink($wwwDir . $file);
        }
    }
    
    if (rmdir($wwwDir)) {
        echo "<p style='color: green;'>✓ Папка 'www' успешно удалена</p>";
    } else {
        echo "<p style='color: red;'>✗ Ошибка удаления папки</p>";
    }
} else {
    echo "<p style='color: orange;'>! Папка 'www' не существует</p>";
}
echo "<br>";

// ЗАДАНИЕ 4: Создание папок из массива
echo "<h3>Задание 4: Создание папок из элементов массива</h3>";

// Восстанавливаем папку test
if (!file_exists($testDir)) {
    mkdir($testDir, 0777, true);
}

$folderNames = array('documents', 'images', 'videos', 'music', 'archives');

echo "<p>Создаем папки: " . implode(', ', $folderNames) . "</p>";

foreach ($folderNames as $folderName) {
    $newFolderPath = $testDir . $folderName . '/';
    if (!file_exists($newFolderPath)) {
        if (mkdir($newFolderPath, 0777, true)) {
            echo "<p style='color: green;'>✓ Создана папка: $folderName</p>";
        }
    } else {
        echo "<p style='color: orange;'>! Папка уже существует: $folderName</p>";
    }
}
echo "<br>";

// ЗАДАНИЕ 5: Поиск всех jpg файлов
echo "<h3>Задание 5: Поиск всех файлов с расширением .jpg</h3>";

// Создадим несколько тестовых jpg файлов для демонстрации
$testJpgFiles = array(
    $baseDir . 'photo1.jpg',
    $baseDir . 'image.jpg',
    $baseDir . 'picture.jpg'
);

foreach ($testJpgFiles as $jpgFile) {
    if (!file_exists($jpgFile)) {
        $file = fopen($jpgFile, 'w');
        if ($file) {
            fwrite($file, 'test image data');
            fclose($file);
        }
    }
}

// Поиск jpg файлов с помощью glob()
$jpgFiles = glob($baseDir . '*.jpg');

if (!empty($jpgFiles)) {
    echo "<p>Найдено jpg файлов: <strong>" . count($jpgFiles) . "</strong></p>";
    echo "<ul>";
    foreach ($jpgFiles as $file) {
        $fileName = basename($file);
        $fileSize = filesize($file);
        echo "<li>$fileName (размер: $fileSize байт)</li>";
    }
    echo "</ul>";
    echo "<p style='color: green;'>✓ Поиск завершен</p>";
} else {
    echo "<p style='color: orange;'>! JPG файлы не найдены</p>";
}
echo "<br>";

// ============================================================================
// ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ О ФАЙЛАХ
// ============================================================================
echo "<h2>Дополнительная информация о файлах</h2>";
echo "<hr>";

if (file_exists($mirInFolder)) {
    echo "<h3>Информация о файле folder/mir.txt:</h3>";
    echo "<ul>";
    echo "<li>Размер: " . filesize($mirInFolder) . " байт</li>";
    echo "<li>Тип: " . filetype($mirInFolder) . "</li>";
    echo "<li>Последнее изменение: " . date("d.m.Y H:i:s", filemtime($mirInFolder)) . "</li>";
    echo "<li>Последний доступ: " . date("d.m.Y H:i:s", fileatime($mirInFolder)) . "</li>";
    echo "</ul>";
}

echo "<br>";

// ============================================================================
// СТРУКТУРА СОЗДАННЫХ ФАЙЛОВ И ПАПОК
// ============================================================================
echo "<h2>Структура созданных файлов и папок</h2>";
echo "<hr>";

function listFiles($dir, $prefix = '') {
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $path = $dir . $file;
        $isDir = is_dir($path);
        $icon = $isDir ? '📁' : '📄';
        $size = $isDir ? '' : ' (' . filesize($path) . ' байт)';
        
        echo $prefix . $icon . ' ' . $file . $size . "<br>";
        
        if ($isDir) {
            listFiles($path . '/', $prefix . '  ');
        }
    }
}

echo "<h3>Содержимое папки lab11_files/:</h3>";
listFiles($baseDir);

echo "<hr>";
echo "<p style='color: green;'><strong>Все задания лабораторной работы 11 выполнены!</strong></p>";
?>

