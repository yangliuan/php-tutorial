<?php
//对图片进行圆形裁切

$width = '154';

$height = '154';

$cornerRadius = 154 / 2;

//裁按找指定宽高裁切头像
$image = new Imagick('../img/avatar.jpeg');

$image->setImageFormat('png');

$image->thumbnailImage($width, $height);

//创建透明背景蒙版
$mask = new Imagick();

$mask->newImage($width, $height, new ImagickPixel('transparent'), 'png');

//基于头像大小绘制圆形,并写入到蒙版图片上
$shape = new ImagickDraw();

$shape->setFillColor(new ImagickPixel('black'));

$shape->roundRectangle(0, 0, $width - 1, $height - 1, $cornerRadius, $cornerRadius);

$mask->drawImage($shape);

//合并图片
$image->compositeImage($mask, Imagick::COMPOSITE_DSTIN, 0, 0);

$image->writeImage('../img/result.png');

echo '<img src="../img/result.png">';
