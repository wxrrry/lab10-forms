<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка обязательных полей email и password
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        echo "<h3>✅ Данные успешно получены!</h3>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><strong>Пароль:</strong> " . str_repeat('•', strlen($_POST['password'])) . "</p>";
        
        if (!empty($_POST['name'])) {
            echo "<p><strong>Имя:</strong> " . htmlspecialchars($_POST['name']) . "</p>";
        }
        if (!empty($_POST['gender'])) {
            $genders = ['male' => 'Мужской', 'female' => 'Женский', 'other' => 'Другой'];
            echo "<p><strong>Пол:</strong> " . $genders[$_POST['gender']] . "</p>";
        }
        echo "<p class='success'>Регистрация прошла успешно!</p>";
    } else {
        echo "<p class='error'>❌ Ошибка: поля Email и Пароль обязательны для заполнения!</p>";
    }
    echo "<p><a href='index.php'>← Вернуться к форме</a></p>";
} else {
    echo "<p class='error'>Доступ запрещён. Отправьте форму методом POST.</p>";
}
?>
