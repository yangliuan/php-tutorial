<?php
//过滤数据的应用方式
$data = [
    'a'=>null,
    'b'=>1,
    'c'=>[
        'a'=>null,
        'b'=>1,
        'c'=>'',
        'd'=>[
            'a'=>null,
            'b'=>1,
            'c'=>'',
            'd'=>[
                null
            ]
        ]
    ]
];
echo '原始数组','<pre>';
var_dump($data);

$res = array_filter($data, function ($value) {
    return $value !== null;
});
echo '过滤一维','<pre>';
var_dump($res);

function array_filter_recursive(array $array, callable $callback)
{
    foreach ($array as &$value) {
        if (is_array($value)) {
            $value = array_filter_recursive($value, $callback);
        }
    }

    return array_filter($array, $callback);
}
$res = array_filter_recursive($data, function ($value) {
    return $value !== null;
});
echo '过滤多维','<pre>';
var_dump($res);
