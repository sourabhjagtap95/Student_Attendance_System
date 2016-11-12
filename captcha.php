<?php
$str= md5(microtime());
$str=substr($str,0,5);
session_start();
$_SESSION['captcha_code']=$str;
$img=imagecreate(300,30);
imagecolorallocate($img,255,255,255);
$txtcol=imagecolorallocate($img,0,0,0);
imagestring($img,5,120,5,$str,$txtcol);
imagejpeg($img);
?>
