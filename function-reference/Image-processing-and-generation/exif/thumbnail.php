<?php
$img2 = '../img/P1010172.jpg';
$thumbnail = exif_thumbnail($img2, $width, $height, $type);
header("Content-type: " . image_type_to_mime_type($type));
echo $thumbnail;
exit;
