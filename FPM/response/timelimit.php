<?php 
/**
 * fpm模式下需要设置脚本超时时间
 */
set_time_limit(0);
$i = 0;
while (true) {
    # code...
    echo $i,'次数',date("Y-m-d H:i:s").'<br/>';
    $i++;
}