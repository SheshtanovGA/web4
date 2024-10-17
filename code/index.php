<?php
require 'vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets API');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$path = 'credentials.json';
$client->setAuthConfig($path);

$service = new \Google_Service_Sheets($client);
$spreadsheetId = '1FJsMLqctfiXPpjykB7IV55NyeeFGkwgiWutfS_nFQX0';

$categories = ['factory', 'galley', 'unemployed'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $category = trim($_POST['category']);
    $title = trim($_POST['title']);
    $text = trim($_POST['text']);

    if ($email && $category && $title && $text && in_array($category, $categories)) {
        $data = [
            [$email, $category, $title, $text]
        ];
        $range = 'Sheet1!A:D';
        $body = new \Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

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

echo "<h2>Объявления</h2>";
foreach ($categories as $category) {
    echo "<h3>" . ucfirst($category) . "</h3>";
    echo "<ul>";

    $range = 'Sheet1!A:D';
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();

    if ($values) {
        foreach ($values as $row) {
            if ($row[1] === $category) {
                $title = htmlspecialchars($row[2]);
                $content = htmlspecialchars($row[3]);
                echo "<li><strong>$title:</strong> $content</li>";
            }
        }
    } else {
        echo "<li>Нет объявлений.</li>";
    }

    echo "</ul>";
}
?>
