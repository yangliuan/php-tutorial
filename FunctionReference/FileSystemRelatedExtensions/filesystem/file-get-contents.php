<?php
$path = '../../../storage/e.php';
$path = realpath($path);

if (!file_exists($path)) {
    die('文件不存在');
}

$string = file_get_contents('../../../storage/e.php');
var_dump($string);

$handle = fopen($path, 'r+');
$string = fread($handle, filesize($path));
var_dump($string);
fclose($handle);
