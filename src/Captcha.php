<?php
session_start();

class Captcha
{
  public static function generateCode($length = 6): string
  {
    return substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZ23456789'), 0, $length);
  }

  public static function setCode(string $code): void
  {
    $_SESSION['captcha'] = $code;
  }
}
