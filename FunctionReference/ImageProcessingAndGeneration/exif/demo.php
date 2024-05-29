<?php
$img = '../img/P1010067.ORF';
$img2 = '../img/P1010172.jpg';
$type = exif_imagetype($img2);
var_dump($type);
echo '<hr>';
$data = exif_read_data($img2);
echo '<pre>';
var_dump($data);
echo '<hr>';
