<?php
include '../function/files-helps.php';

$dir = '/home/yangliuan/Music';
$dirs = scandir($dir);
echo '<pre>';
var_dump($dirs);

$ds = disk_total_space($dir);
echo $ds, PHP_EOL;
$dsString = fileSizeConvert($ds);
echo $dsString, PHP_EOL;
