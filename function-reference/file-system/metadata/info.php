<?php
$filePath = 'demo.txt';

echo '<h1>修改前</h1>';
echo 'filectime', '创建时间', date('Y-m-d H:i:s', filectime($filePath)), PHP_EOL;
echo 'fileatime', '访问时间', date('Y-m-d H:i:s', fileatime($filePath)), PHP_EOL;
echo 'filemtime', '修改时间', date('Y-m-d H:i:s', filemtime($filePath)), PHP_EOL;

touch($filePath, strtotime('2020-01-01 00:00:01'), time());
echo '<h1>修改后</h1>';
echo 'filectime', '创建时间', date('Y-m-d H:i:s', filectime($filePath)), PHP_EOL;
echo 'fileatime', '访问时间', date('Y-m-d H:i:s', fileatime($filePath)), PHP_EOL;
echo 'filemtime', '修改时间', date('Y-m-d H:i:s', filemtime($filePath)), PHP_EOL;
