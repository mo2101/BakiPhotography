<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.html");
  exit();
}

$success = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["photo"])) {
  $target_dir = "../images/";
  $filename = basename($_FILES["photo"]["name"]);
  $target_file = $target_dir . $filename;

  if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $success = true;
  } else {
    $error = "❌ Failed to upload.";
  }
} else if (!isset($_FILES["photo"])) {
  $error = "❌ No file uploaded.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Result – Baki Admin</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="../images/logo.PNG" alt="Logo" height="50">
      <h1>Upload Result</h1>
    </div>
    <nav>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a class="active" href="upload.html">Upload</a></li>
        <li><a href="manage.php">Manage</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="booking">
    <?php if ($success): ?>
      <h2>✅ Photo uploaded successfully!</h2>
      <p><a href="upload.html" class="btn">Upload Another</a></p>
      <p><a href="manage.php" class="btn">Manage Photos</a></p>
    <?php else: ?>
      <h2><?php echo $error; ?></h2>
      <p><a href="upload.html" class="btn">Try Again</a></p>
    <?php endif; ?>
  </section>
</body>
</html>
