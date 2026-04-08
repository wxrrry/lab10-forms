<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // === ЛОГИКА КАЛЬКУЛЯТОРА ===
    if (isset($_POST['num1'], $_POST['num2'], $_POST['operation'])) {
        $n1 = (float)$_POST['num1'];
        $n2 = (float)$_POST['num2'];
        $op = $_POST['operation'];
        $res = 0;
        $error = '';

        switch($op) {
            case 'add': $res = $n1 + $n2; break;
            case 'sub': $res = $n1 - $n2; break;
            case 'mul': $res = $n1 * $n2; break;
            case 'div':
                if ($n2 == 0) {
                    $error = '❌ Ошибка: деление на ноль невозможно!';
                } else {
                    $res = $n1 / $n2;
                }
                break;
            default: $error = 'Неизвестная операция';
        }

        if ($error) {
            echo "<p class='error'>$error</p>";
        } else {
            $symbols = ['add'=>'+', 'sub'=>'−', 'mul'=>'×', 'div'=>'÷'];
            echo "<p class='success'>✅ Результат: $n1 {$symbols[$op]} $n2 = <strong>$res</strong></p>";
        }
        echo "<p><a href='index.php'>← Вернуться</a></p>";
        exit;
    }

    // === ЛОГИКА РЕГИСТРАЦИИ ===
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        echo "<h3>✅ Данные успешно получены!</h3>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><strong>Пароль:</strong> " . str_repeat('•', strlen($_POST['password'])) . "</p>";
        if (!empty($_POST['name'])) echo "<p><strong>Имя:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
        if (!empty($_POST['gender'])) {
            $genders = ['male' => 'Мужской', 'female' => 'Женский', 'other' => 'Другой'];
            echo "<p><strong>Пол:</strong> " . $genders[$_POST['gender']] . "</p>";
        }
        echo "<p class='success'>Регистрация прошла успешно!</p>";
    } else {
        echo "<p class='error'>❌ Ошибка: поля Email и Пароль обязательны!</p>";
    }
    echo "<p><a href='index.php'>← Вернуться</a></p>";
} else {
    echo "<p class='error'>Доступ запрещён. Используйте POST-запрос.</p>";
}
?>
