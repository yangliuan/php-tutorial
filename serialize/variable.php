<?php

$arr = ['test' => [1, 2, 3], 1];
$ser_arr = serialize($arr);
var_dump($ser_arr);
$ser_arr = unserialize($ser_arr);
echo '<br>','<pre>';
print_r($ser_arr);
