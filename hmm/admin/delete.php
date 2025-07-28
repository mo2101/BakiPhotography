<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.html");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $filename = $_POST['filename'] ?? '';
  $filepath = "../images/" . basename($filename);

  if (file_exists($filepath)) {
    unlink($filepath);
  }
}

header("Location: manage.php");
exit();
