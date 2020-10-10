<?php

/**
 * 随机创建文件夹，名称为英文，中文，数组
 *
 * @param [type] $num
 * @param string $lang
 * @return void
 */

function getChar($num, $lang = 'zh-cn')  // $num为生成汉字的数量
{
    $b = '';

    for ($i = 0; $i < $num; $i++) {
        if ($lang == 'zh-cn') {
            // 使用chr()函数拼接双字节汉字，前一个chr()为高位字节，后一个为低位字节
            $a = chr(mt_rand(0xB0, 0xD0)) . chr(mt_rand(0xA1, 0xF0));
            // 转码
            $b .= iconv('GB2312', 'UTF-8', $a);
        } elseif ($lang == 'en') {
            $a = chr(mt_rand(65, 90)) . chr(mt_rand(97, 122));
            $b .= $a;
        } elseif ($lang == 'number') {
            $a = chr(mt_rand(97, 122));
            $b .= $a;
        }
    }

    return $b;
}

// var_dump(getChar(10, 'zh-cn'));
// var_dump(getChar(10, 'en'));
// var_dump(getChar(10, 'number'));

$dirCount = 10;
$lang = ['zh-cn', 'en', 'number'];

for ($i = 1; $i < $dirCount; $i++) {
    mkdir(getChar(mt_rand(5, 50), $lang[array_rand($lang)]), 775);
}
