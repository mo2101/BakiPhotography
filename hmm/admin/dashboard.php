<?php
session_start();

// ✅ Replace with your own credentials
$valid_user = "admin";
$valid_pass = "photopass123";

// Check if POST request has login credentials
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $valid_user && $password === $valid_pass) {
        $_SESSION['logged_in'] = true;
    } else {
        header("Location: login.html?error=1");
        exit();
    }
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard – Baki Photography</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="../images/logo.PNG" alt="Logo" height="50">
      <h1>Admin Dashboard</h1>
    </div>
    <nav>
      <ul>
        <li><a class="active" href="dashboard.php">Dashboard</a></li>
        <li><a href="upload.html">Upload</a></li>
        <li><a href="manage.php">Manage</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="booking">
    <h2>Welcome, Admin</h2>
    <p>Use the navigation above to manage your site.</p>
  </section>
</body>
</html>
