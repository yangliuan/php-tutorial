<?php
$arr = ['牵引车', '自卸车', '皮卡', '微型货车', '轻型货车', '中型货车'];

foreach ($arr as $key => $value)
{
    $res = in_array($value, $arr);
    var_dump($res);
}
