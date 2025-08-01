<?php
require_once __DIR__ . '/../src/Captcha.php';

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'captcha':
      require_once __DIR__ . '/../src/generate-captcha.php';
      exit;

    case 'verify':
      require_once __DIR__ . '/../src/verify.php';
      exit;
  }
}

$error = $_SESSION['captcha_error'] ?? '';
$email = $_SESSION['email'] ?? '';
unset($_SESSION['captcha_error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sweepstakes Form</title>
  <link rel="stylesheet" href="styles.css">
  </meta>
</head>

<body>
  <div class="container">
    <h1>Enter your information for a chance to win</h1>
    <?php if ($error): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="?action=verify" method="post">
      <div class="form-element">
        <label for="email">Email</label>
        <input autocomplete="email" type="email" name="email" id="email" placeholder="name@domain.com" value="<?php echo $email; ?>" required>
      </div>
      <div class="form-group">
        <div class="form-element">
          <label for="captcha">Enter the code</label>
          <input type="text" name="captcha" id="captcha" required>
        </div>
        <div>
          <img src="?action=captcha" alt="captcha">
        </div>
      </div>
      <button type="submit">Enter Sweepstakes</button>
    </form>
  </div>
</body>

</html>