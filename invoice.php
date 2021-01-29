<?php
$file='./'.uniqid(). '.jpg';
file_put_contents($file,file_get_contents('./images/card22.jpg'));
die();
$str=base64_encode(file_get_contents('./images/card22.jpg'));
echo strlen($str);
die();
$decode=base64_decode($str);
$img=imagecreatefromstring($decode);
if(!$img){
    echo 'Error';
    die();
}
header('Content-Type: image/jpeg');
imagepng($img);

?>
