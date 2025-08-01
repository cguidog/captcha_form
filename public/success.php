<?php
session_start();

if (!isset($_SESSION['success'])) {
  header("Location: index.php");
  exit;
} else {
  session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>You are in!</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container appear">
    <div>
      <h1>You are in!</h1>
      <p>Thank you for entering the sweepstakes. We will contact you if you are one of the lucky winners!</p>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
  window.onload = () => {
    const colors = ['#00809D', '#504215', '#FFD700', '#FCF8DD'];

    setTimeout(() => {
      confetti({
        particleCount: 120,
        spread: 80,
        origin: {
          y: 0.3
        },
        colors: colors,
      });
    }, 500);
  };
</script>

</html>