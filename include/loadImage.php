<?php
session_start();

function LoadImage($filename)
{
$type = exif_imagetype($filename); // [] if you don't have exif you could use getImageSize()
$allowedTypes = array(
1,  // [] gif
2,  // [] jpg
3,  // [] png
6   // [] bmp
);
if (!in_array($type, $allowedTypes)) {
return false;
}


switch ($type) {
case 1 :
    $image = imageCreateFromGif($filename);
    $white = imagecolorallocate($image, 255, 255, 255);
    $font_path = 'arial.ttf';
    $text = "This is a sunset!";
    imagettftext($image, 25, 0, 75, 300, $white, $font_path, $text);
break;
case 2 :
    $image = imageCreateFromJpeg($filename);
    $white = imagecolorallocate($image, 255, 255, 255);
    $font_path = 'arial.ttf';
    $text = "This is a sunset!";
    imagettftext($image, 25, 0, 75, 300, $white, $font_path, $text);
break;
case 3 :
    $image = imageCreateFromPng($filename);
    $white = imagecolorallocate($image, 255, 255, 255);
    $font_path = 'arial.ttf';
    $text = "This is a sunset!";
    imagettftext($image, 25, 0, 75, 300, $white, $font_path, $text);
break;
case 6 :
    $image = imageCreateFromBmp($filename);
    $white = imagecolorallocate($image, 255, 255, 255);
    $font_path = 'arial.ttf';
    $text = "This is a sunset!";
    imagettftext($image, 25, 0, 75, 300, $white, $font_path, $text);
break;
}
return $image;

}


$imagefile = 'images/' . $_SESSION['file'];
$img = LoadImage($imagefile);
imagejpeg($img, $imagefile);

?>