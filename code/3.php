<?php
$adsDir = 'ads/';

$categories = ['factory', 'galley', 'unemloyed'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $category = trim($_POST['category']);
    $title = trim($_POST['title']);
    $text = trim($_POST['text']);

    if ($email && $category && $title && $text && in_array($category, $categories)) {
        $filename = $adsDir . $category . '/' . preg_replace('/[^a-zA-Z0-9-_]/', '_', $title) . '.txt';

        file_put_contents($filename, $text);

        echo "<p>Объявление добавлено!</p>";
    } else {
        echo "<p>Пожалуйста, заполните все поля корректно.</p>";
    }
}

echo "<h1>Список объявлений</h1>";
echo "<form method='post'>";
echo "<label for='email'>Email:</label><br>";
echo "<input type='email' name='email' required><br><br>";

echo "<label for='category'>Категория:</label><br>";
echo "<select name='category' required>";
foreach ($categories as $category) {
    echo "<option value='$category'>$category</option>";
}
echo "</select><br><br>";

echo "<label for='title'>Заголовок объявления:</label><br>";
echo "<input type='text' name='title' required><br><br>";

echo "<label for='text'>Текст объявления:</label><br>";
echo "<textarea name='text' rows='4' required></textarea><br><br>";

echo "<input type='submit' value='Добавить'>";
echo "</form>";

foreach ($categories as $category) {
    echo "<h2>" . ucfirst($category) . "</h2>";
    echo "<ul>";

    if (is_dir($adsDir . $category)) {
        $files = glob($adsDir . $category . '/*.txt');
        foreach ($files as $file) {
            $title = basename($file, '.txt');
            $content = file_get_contents($file);
            echo "<li><strong>$title:</strong> $content</li>";
        }
    }

    echo "</ul>";
}
?>
