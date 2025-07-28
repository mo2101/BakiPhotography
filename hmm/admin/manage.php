<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: login.html");
  exit();
}

$image_dir = "../images";
$images = array_filter(scandir($image_dir), function($file) {
  return in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Photos – Baki Admin</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="../images/logo.PNG" alt="Logo" height="50">
      <h1>Manage Photos</h1>
    </div>
    <nav>
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="upload.html">Upload</a></li>
        <li><a class="active" href="manage.php">Manage</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="portfolio">
    <h2>Uploaded Photos</h2>
    <div class="gallery">
      <?php foreach ($images as $img): ?>
        <div class="photo">
          <img src="<?php echo $image_dir . '/' . $img; ?>" alt="">
          <form action="delete.php" method="POST" style="margin-top:10px;">
            <input type="hidden" name="filename" value="<?php echo $img; ?>">
            <button type="submit" class="btn" onclick="return confirm('Delete this image?')">Delete</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</body>
</html>
