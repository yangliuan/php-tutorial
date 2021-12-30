<?php
/**
 *php实现计算公式计算数据
 */

//方法一
list($P, $L) = [5,6];
$formula = '$result = ';
$formula .= '$P/2+$L*3+23';
$formula .= ';';
eval($formula);
echo $result , PHP_EOL;

//方法二
$eval = '$result = ';
$formula = '{P}/2+{L}*3+23';
//接收输入值
$params = ['{P}','{L}'];
$input = [5,6];
$eval .= str_replace($params, $input, $formula);
$eval .= ';';
eval($eval);
echo $result,PHP_EOL;
