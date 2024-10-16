<?php
session_start();
if (isset($_SESSION['surname'], $_SESSION['name'], $_SESSION['age'])) {
    $surname = $_SESSION['surname'];
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    echo "<h1>Данные пользователя:</h1>";
    echo "<p>Фамилия: $surname</p>";
    echo "<p>Имя: $name</p>";
    echo "<p>Возраст: $age</p>";
} else {
    echo "<p>Данные не найдены.</p>";
}
?>
<a href="index.php">
    <button>На главную</button>
</a>
