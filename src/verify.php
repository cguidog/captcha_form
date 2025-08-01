<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['email'] = $_POST['email'];
  $userCaptcha = strtoupper(trim($_POST['captcha']));
  $actualCaptcha = $_SESSION['captcha'] ?? '';
  if ($userCaptcha === $actualCaptcha) {
    $_SESSION['success'] = true; 
    header("Location: success.php");
    exit;
  } else {
    $_SESSION['captcha_error'] = "Incorrect code. Please try again.";
    header("Location: index.php");
    exit;
  }
}