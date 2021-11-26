<?php
//根据总数和步进制，求开始和结束的数字
$total = 100000;
$step = 10000;
$start = 0;
$end = 10000;

for ($i = 0 ; $i< $total ; $i += $step) {
    echo '$i:',$i,'$start:',$start,'$end',$end,PHP_EOL;
    $start += $step;
    $end += $step;
}
