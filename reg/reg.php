<?php
// Включаем отображение ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Получаем данные из формы
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$login = trim($_POST['login'] ?? '');
$pass = trim($_POST['pass'] ?? '');

// Проверяем корректность данных
if (strlen($username) < 3) {
  die(json_encode(['error' => 'Введите имя (минимум 3 символа)']));
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die(json_encode(['error' => 'Введите корректный email']));
}
if (strlen($login) < 3) {
  die(json_encode(['error' => 'Введите логин (минимум 3 символа)']));
}
if (strlen($pass) < 3) {
  die(json_encode(['error' => 'Пароль должен быть минимум 3 символов']));
}

// Хешируем пароль (используем безопасный алгоритм)
$passHash = password_hash($pass, PASSWORD_DEFAULT);

// Подключение к БД
$user = 'root';
$password = 'root';
$db = 'testing';
$host = 'localhost';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die(json_encode(['error' => 'Ошибка подключения к БД: ' . $e->getMessage()]));
}

// Проверяем, нет ли уже такого email или логина
$sql = "SELECT id FROM users WHERE email = ? OR login = ?";
$query = $pdo->prepare($sql);
$query->execute([$email, $login]);

if ($query->fetch()) {
  die(json_encode(['error' => 'Этот email или логин уже занят']));
}

// Вставляем пользователя
try {
  $sql = 'INSERT INTO users (name, email, login, pass) VALUES (?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$username, $email, $login, $passHash]);

  echo json_encode(['success' => 'Регистрация успешна']);
} catch (PDOException $e) {
  die(json_encode(['error' => 'Ошибка при регистрации: ' . $e->getMessage()]));
}
?>