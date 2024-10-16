<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма ввода</title>
</head>
<body>
    <form method="post" action="2b_process.php">
        <label for="surname">Фамилия:</label>
        <input type="text" name="surname" required><br>

        <label for="name">Имя:</label>
        <input type="text" name="name" required><br>

        <label for="age">Возраст:</label>
        <input type="number" name="age" required><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
