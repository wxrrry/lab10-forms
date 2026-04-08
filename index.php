<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация - Лабораторная 10</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>📝 Форма регистрации</h2>
    <form action="action.php" method="POST">
        <label>Имя: <input type="text" name="name" placeholder="Введите имя"></label><br>
        <label>Email: <input type="email" name="email" placeholder="example@mail.com" required></label><br>
        <label>Пароль: <input type="password" name="password" required></label><br>
        <label>Пол:
            <select name="gender">
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Другой</option>
            </select>
        </label><br>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p><a href="?page=calc">→ Перейти к калькулятору</a></p>
</body>
</html>
