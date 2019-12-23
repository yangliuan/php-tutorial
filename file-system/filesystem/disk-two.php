<?php
$fp = popen('df| grep -E "^(/)"', "r");
$rs = fread($fp, 1024);
pclose($fp);
echo '<pre>', $rs;
$rs = preg_replace('/\s{2,}/', ' ', $rs);  //把多个空格换成 “_”
$hd = explode(" ", $rs);
$hd_avail = trim($hd[3], 'G'); //磁盘可用空间大小 单位G
$hd_usage = trim($hd[4], '%'); //挂载点 百分比
var_dump($hd);
