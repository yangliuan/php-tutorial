<?php

//资源类型示例

$filename = realpath(__DIR__.'/../README.md');
file_exists($filename) or exit('文件不存在!'.$filename);
$filesize = filesize($filename);
$handle = fopen($filename, 'r+') or exit('打开文件失败!'.$filename);
$type = get_resource_type($handle);
echo $type,'<br>';
var_dump($handle);
echo '<br>';
$string = fread($handle, $filesize);
var_dump($string);
echo '<br>';
fclose($handle);
