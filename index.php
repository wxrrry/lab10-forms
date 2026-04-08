<<<<<<< HEAD
=======
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 10 - Топчий</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>🧮 Калькулятор</h2>
    <form action="action.php" method="POST">
        <label>Число 1: <input type="number" step="any" name="num1" required></label>
        <label>Число 2: <input type="number" step="any" name="num2" required></label>
        <div style="display: flex; gap: 5px;">
            <button type="submit" name="operation" value="add">+</button>
            <button type="submit" name="operation" value="sub">−</button>
            <button type="submit" name="operation" value="mul">×</button>
            <button type="submit" name="operation" value="div">÷</button>
        </div>
    </form>
    
    <hr>
    
    <h2>📝 Регистрация</h2>
    <form action="action.php" method="POST">
        <label>Имя: <input type="text" name="name"></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
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
</body>
</html>
>>>>>>> 55a6057 (Добавлена форма регистрации с полями: имя, email, пароль, пол)
