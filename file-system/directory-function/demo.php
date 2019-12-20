<?php
$dirs = scandir('/');
echo '<pre>';
var_dump($dirs);

$ds = disk_total_space('/');
echo $ds;
