<?php
require_once '../include.php';

function verifyImage($type = 1, $length = 4)
{
    $width = 100;
    $height = 38;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $fonts = array("one.TTF", "two.TTF", "three.TTF", "four.TTF");
    $chars = buildRandomString($type, $length);
    $_SESSION['verify'] = $chars;
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(19, 23);
        $angle = mt_rand(-15, 15);
        $x = 5 + $size * $i;
        $y = mt_rand(25, 31);
        $font = "../fonts/" . $fonts[mt_rand(0, count($fonts) - 1)];
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        // $verify = $verify . $text;
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
