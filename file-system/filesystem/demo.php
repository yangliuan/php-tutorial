<?php
echo '<pre>', PHP_EOL;
$fp = popen('df -lh | grep -E "^(/)"', "r");
$rs = fread($fp, 1024);
pclose($fp);
var_dump($rs);
$rs = preg_replace("/\s{2,}/", ' ', $rs);  //把多个空格换成 “_”
$hd = explode(" ", $rs);
$hd_avail = trim($hd[3], 'G'); //磁盘可用空间大小 单位G
$hd_usage = trim($hd[4], '%'); //挂载点 百分比
$hd = array_chunk($hd, 6);
echo '<pre>', PHP_EOL;
print_r($hd);
