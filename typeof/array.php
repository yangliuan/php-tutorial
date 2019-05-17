<?php

//定义
$arr = array(1, 'test' => 'sfsdd');
echo '<pre>';
print_r($arr);
$arr = [1, 'test' => 'sfsdfds'];
echo '<pre>';
print_r($arr);
$arr = [];
$arr[] = 1;
$arr['test'] = 'sfdssfs';
echo '<pre>';
print_r($arr);

//类型强制覆盖
$arr = array(
    1 => 'a',
    '1' => 'b',
    1.5 => 'c',
    true => 'd',
);
echo '<pre>';
print_r($arr);

//索引自动补全
$arr = array(
    'a',
    'b',
6 => 'c',
    'd',
);
echo '<pre>';
print_r($arr);

//访问数组
var_dump($arr[0], $arr[6]);

function getArray()
{
    return [1, 3, 5];
}
var_dump(getArray()[1]);
echo '<br>';

list($a, $b, $c) = getArray();
var_dump($a, $b, $c);
list(, , $c) = getArray();
var_dump($c);

//删除数组
$array = array(1, 2, 3, 4, 5);
echo '<pre>';
print_r($array);

// 现在删除其中的所有元素，但保持数组本身不变:
foreach ($array as $i => $value) {
    unset($array[$i]);
}
echo '<pre>';
print_r($array);

// 添加一个单元（注意新的键名是 5，而不是你可能以为的 0）
$array[] = 6;
echo '<pre>';
print_r($array);

// 重新索引：
$array = array_values($array);
$array[] = 7;
echo '<pre>';
print_r($array);

//类型转换
class A
{
    private $A; // This will become '\0A\0A'
}

class B extends A
{
    private $A; // This will become '\0B\0A'
    public $AA; // This will become 'AA'
}

var_dump((array) new B());
echo '<br>';
