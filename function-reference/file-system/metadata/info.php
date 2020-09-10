<?php
$filePath = '/home/yangliuan/Pictures/Wallpapers/WriteCode.png';

echo 'filectime', '创建时间', date('Y-m-d H:i:s', filectime($filePath)), PHP_EOL;
echo 'fileatime', '访问时间', date('Y-m-d H:i:s', fileatime($filePath)), PHP_EOL;
echo 'filemtime', '修改时间', date('Y-m-d H:i:s', filemtime($filePath)), PHP_EOL;
