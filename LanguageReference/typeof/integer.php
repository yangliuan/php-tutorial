<?php

//整型值可以使用十进制，十六进制，八进制或二进制表示，前面可以加上可选的符号（- 或者 +）。
//二进制表达的 integer 自 PHP 5.4.0 起可用。
//要使用八进制表达，数字前必须加上 0（零）。要使用十六进制表达，数字前必须加上 0x。要使用二进制表达，数字前必须加上 0b;

$a = 1234; // 十进制数
$a = -123; // 负数
$a = 0123; // 八进制数 (等于十进制 83)
$a = 0x1A; // 十六进制数 (等于十进制 26)
$a = 0b11111111; // 二进制数字 (等于十进制 255)

echo '字长',PHP_INI_SIZE,'<br>';
echo '最大值',PHP_INI_MAX,'<br>';
echo '最小值',PHP_INI_MIN,'<br>';

//32位系统,整型溢出 最大值20亿  位数10位
$large_number = 2147483647;
var_dump($large_number);       // int(2147483647)
echo '<br>';

$large_number = 2147483648;
var_dump($large_number);        // float(2147483648)
echo '<br>';

$million = 1000000;
$large_number = 50000 * $million;
var_dump($large_number);
echo '<br>';

//64位系统 整型溢出 最大值9E18  19位
$large_number = 9223372036854775807;
var_dump($large_number);                     // int(9223372036854775807)
echo '<br>';

$large_number = 9223372036854775808;
var_dump($large_number);                     // float(9.2233720368548E+18)
echo '<br>';

$million = 1000000;
$large_number = 50000000000000 * $million;
var_dump($large_number);                     // float(5.0E+19)
echo '<br>';

//PHP 中没有整除的运算符。1/2 产生出 float 0.5。 值可以舍弃小数部分，强制转换为 integer，或者使用 round() 函数可以更好地进行四舍五入。
var_dump(25 / 7);         // float(3.5714285714286)
echo '<br>';
var_dump((int) (25 / 7)); // int(3)
echo '<br>';
var_dump(round(25 / 7));  // float(4)
echo '<br>';

//类型转换 布尔转整型
var_dump((int) false); //0
echo '<br>';
var_dump((int) true); //1
echo '<br>';

//字符串转整型
$a = '123.123';
var_dump((int) $a);
echo '<br>';

$a = 042;
var_dump((int) $a);
echo '<br>';

echo intval(42),'<br>';                      // 42
echo intval(4.2),'<br>';                     // 4
echo intval('42'),'<br>';                    // 42
echo intval('+42'),'<br>';                   // 42
echo intval('-42'),'<br>';                   // -42
echo intval(042),'<br>';                     // 34
echo intval('042'),'<br>';                   // 42
echo intval(1e10),'<br>';                    // 1410065408
echo intval('1e10'),'<br>';                  // 1
echo intval(0x1A),'<br>';                    // 26
echo intval(42000000),'<br>';                // 42000000
echo intval(420000000000000000000),'<br>';   // 0
echo intval('420000000000000000000'),'<br>'; // 2147483647
echo intval(42, 8),'<br>';                   // 42
echo intval('42', 8),'<br>';                 // 34
echo intval(array()),'<br>';                 // 0
echo intval(array('foo', 'bar')),'<br>';     // 1
