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
    <form method="post" action="2c_process.php">
        <label for="name">Имя:</label>
        <input type="text" name="name" required><br>

        <label for="age">Возраст:</label>
        <input type="number" name="age" required><br>

        <label for="salary">Зарплата:</label>
        <input type="number" name="salary" required><br>

        <label for="academicdebt">Единиц академической задолженности:</label>
        <input type="number" name="academicdebt" required><br>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>
