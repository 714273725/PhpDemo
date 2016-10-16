<?php
require_once 'string.php';
function verifyImage($type=1,$length = 4){
    $width = 80;
    $height = 28;
    $image = imagecreatetruecolor($width,$height);
    $white = imagecolorallocate($image,255,255,255);
    $black = imagecolorallocate($image,0,0,0);
    imagefilledrectangle($image,1,1,$width-2,$height-2,$white);
    $chars = buildRandomString($type,$length);
    $fonts = array("one.TTF","two.TTF","three.TTF","four.TTF");
    $sess_name = "verify";
    $_SESSION[$sess_name] = $chars;
    for($i=0;$i<$length;$i++){
        $size = mt_rand(14,18);
        $angle = mt_rand(-15,15);
        $x = 5+$size*$i;
        $y = mt_rand(20,26);
        $font = "../fonts/".$fonts[mt_rand(0,count($fonts)-1)];
        $color = imagecolorallocate($image,mt_rand(50,90),mt_rand(80,200),mt_rand(90,180));
        $text = substr($chars,$i,1);
        imagettftext($image,$size,$angle,$x,$y,$color,$font,$text);
    }
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
