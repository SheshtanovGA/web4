<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Подсчет слов и символов</title>
</head>
<body>
    <form method="post">
        <textarea name="text"></textarea><br>
        <input type="submit" value="Подсчитать">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $text = trim($_POST['text']);
        $wordCount = str_word_count($text);
        $charCount = mb_strlen($text); // mb_strlen == not just ASCII

        echo "<p>Количество слов: $wordCount</p>";
        echo "<p>Количество символов: $charCount</p>";
    }
    ?>
    <li><a href="index.php">На главную</a></li>
</body>
</html>
