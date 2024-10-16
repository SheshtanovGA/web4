<?php
session_start(); 

if (isset($_SESSION['user_data'])) {
    $userData = $_SESSION['user_data'];

    echo "<h1>Данные пользователя:</h1>";
    echo "<ul>";
    
    foreach ($userData as $key => $value) {
        echo "<li><strong>" . $key . ":</strong> " . $value . "</li>";
    }
    
    echo "</ul>";
} else {
    echo "<p>Данные не найдены.</p>";
}
?>

<a href="index.php">
    <button>На главную</button>
</a>
