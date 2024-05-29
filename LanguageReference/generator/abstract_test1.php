<?php

$start_time = microtime(true);
$array = array();
$result = '';
for ($count = 1000000; --$count;) {
    $array[] = $count / 2;
}
foreach ($array as $val) {
    $val += 145.56;
    $result .= $val;
}
$end_time = microtime(true);

echo 'time: ', bcsub($end_time, $start_time, 4), "\n";
echo 'memory (byte): ', memory_get_peak_usage(true), "\n";
