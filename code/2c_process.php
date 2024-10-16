<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'salary' => $_POST['salary'],
        'academicdebt' => $_POST['academicdebt']
    ];
    $_SESSION['user_data'] = $data;
}

header('Location: 2c_result.php');
exit();
