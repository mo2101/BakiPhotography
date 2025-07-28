<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Portfolio – Baki Photography</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="sig/logo2.PNG" alt="Baki Photography Logo">
      <h1>Baki Photography</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="portfolio.php">Portfolio</a></li>
        <li><a href="pricing.html">Pricing & Booking</a></li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
    </nav>
  </header>

  <section class="portfolio">
    <h2 style="text-align: center;">My Work</h2>
    <div class="gallery">
      <?php
        $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $files = scandir("images");

        foreach ($files as $file) {
          $ext = pathinfo($file, PATHINFO_EXTENSION);
          if (in_array(strtolower($ext), $image_extensions)) {
            echo "<div class='photo'><img src='images/$file' alt='Photo'></div>";
          }
        }
      ?>
    </div>
  </section>


  <footer>
    <p>© 2025 Baki Photography. All rights reserved.</p>
  </footer>
</body>
</html>
