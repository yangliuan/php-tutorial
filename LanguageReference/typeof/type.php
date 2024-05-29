<?php

//类型转换
$foo = '1';
var_dump($foo);
echo '<br>';
$foo *= 2;
var_dump($foo);
echo '<br>';
$foo = $foo * 1.3;
var_dump($foo);
echo '<br>';
$foo = 5 * '10 little piggies';
var_dump($foo);
echo '<br>';
$foo = 5 * '11 small pigs';
var_dump($foo);
echo '<br>';
$foo = 1;
$foo .= 'test';
var_dump($foo);
echo '<br>';

//布尔值
echo '<hr>','布尔值';
var_dump((bool) '');        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) 'foo');     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) 'false');   // bool(true)
var_dump((bool) 0);         //bool(false)
echo '<br>';
$str = '123';
$type = gettype($str);
echo $type,'<br>';
settype($str, integer);
var_dump($str);
