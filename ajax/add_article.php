<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$intro = trim(strip_tags($_POST['intro']));
$text = trim($_POST['text']);

$error = '';
if (strlen($title) <= 3) {
  $error = htmlspecialchars('Введіть назву статті', ENT_QUOTES, 'UTF-8');
} else if (strlen($intro) <= 15) {
  $error = htmlspecialchars('Введіть інтро для статті', ENT_QUOTES, 'UTF-8');
} else if (strlen($text) <= 20) {
  $error = htmlspecialchars('Введіть текст статті', ENT_QUOTES, 'UTF-8');
}

if ($error != '') {
  echo $error;
  exit();
}

require_once '../mysql_connect.php';

if (!$pdo) {
  die("Не вдалося підключитися до бази даних");
}

try {
  $sql = 'INSERT INTO articles(title, intro, text, date, avtor) VALUES(?, ?, ?, ?, ?)';
  $query = $pdo->prepare($sql);
  $query->execute([$title, $intro, $text, time(), htmlspecialchars($_COOKIE['login'], ENT_QUOTES, 'UTF-8')]);
  echo 'Готово';
} catch (PDOException $e) {
  echo 'Помилка: ' . $e->getMessage();
}
?>