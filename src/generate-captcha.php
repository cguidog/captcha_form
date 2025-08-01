<?php

$code = Captcha::generateCode();
Captcha::setCode($code);
$width = 200;
$height = 50;
$image = new Imagick();
$image->newImage($width, $height, new ImagickPixel('#FCF8DD'));
$image->setImageFormat('png');

$draw = new ImagickDraw();
$draw->setFontSize(24);
$draw->setFillColor(new ImagickPixel('black'));
$draw->setFont('/usr/share/fonts/truetype/noto/NotoMono-Regular.ttf');
$colors = ['#00809D', '#504215', '#D3AF37'];
$x = 10;

for ($i = 0; $i < strlen($code); $i++) {
    $draw->setFillColor(new ImagickPixel('black'));
    $angle = rand(-15, 15);
    $y = rand(25, 35);
    $image->annotateImage($draw, $x, $y, $angle, $code[$i]);
    $x += 20;
}

for ($i = 0; $i < 6; $i++) {
    $color= $colors[random_int(0, count($colors) - 1)];
    $noiseDraw = new ImagickDraw();
    $noiseDraw->setStrokeColor(new ImagickPixel($color));
    $noiseDraw->setStrokeWidth(rand(1, 2));
    $x1 = rand(0, $width);
    $y1 = rand(0, $height);
    $x2 = rand(0, $width);
    $y2 = rand(0, $height);
    $noiseDraw->line($x1, $y1, $x2, $y2);
    $image->drawImage($noiseDraw);
}

$image->waveImage(0.2, 40);
$image->swirlImage(5);
$image->blurImage(1, 0.5);

header('Content-Type: image/png');

echo $image;

$image->clear();
$image->destroy();