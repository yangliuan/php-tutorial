<?php
/*
 * 字符串
 */

//一个字符串 string 就是由一系列的字符组成，其中每个字符等同于一个字节。
//这意味着 PHP 只能支持 256 的字符集，因此不支持 Unicode
//最大可以达到 2GB

//变量解析
 $str = 'test';
 $str = "test$str";
 echo $str,'<br>';

 //解析数组,双引号中的索引数组不能加引号
 $arr = [1, 2, 3, 4, 'key' => 'sfsd'];
 echo "sdfd$arr[1]$arr[2]$arr[key]sdfds",'<br>';

//解析对象属性
class people
{
    public $john = 'John Smith';
    public $jane = 'Jane Smith';
    public $robert = 'Robert Paulsen';

    public $smith = 'Smith';
}
$people = new people();
echo "adfadsd$people->john safd",'<br>';

function test()
{
    return 'test';
}
//花括号
$arr = [1, 'key' => ['k' => 223]];
echo "sfas{test()}sdfsd{$people->jane}sdfsa{$arr['key']['k']}dafd{${test()}}",'<br>';

class beers
{
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
}

$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';

// 有效，输出： I'd like an A & W
echo "I'd like an {${beers::softdrink}}\n",'<br>';

// 也有效，输出： I'd like an Alexander Keith's
echo "I'd like an {${beers::$ale}}\n",'<br>';

//特殊字符
$str = "\n\r\t";
echo $str;

//heredoc 类似于双引号字符串
$str = <<<EOD
sfjasijfisdj
234 sdfd $str
EOD;
echo $str,'<br>';

//nowdoc 类似于单引号
echo <<<'EOT'
My name is "$name". I am printing some $foo->foo.
Now, I am printing some {$foo->bar[1]}.
This should not print a capital 'A': \x41 <br>
EOT;

//数组方式访问字符串
$foo = 'test';
echo $foo[0],'<br>';
$foo[0] = 'e';
echo $foo[0],'<br>';

//整型转字符串
$foo = 1;
echo (string) $foo,'<br>';
echo strval($foo),'<br>';

//浮点转字符串
var_dump((string) 1.33);
echo '<br>';
