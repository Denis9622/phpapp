<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);

    // Отображаем полученные данные
    echo "<h1>Thank you, $name!</h1>";
    echo "<p>Your message: $message</p>";
} else {
    echo "<h1>Invalid request</h1>";
}
?>
