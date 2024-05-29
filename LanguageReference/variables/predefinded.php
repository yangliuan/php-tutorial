<?php

session_start();
//超全局变量
echo '超全局变量$GLOBALS','<pre>';
print_r($GLOBALS);

//服务器和执行环境信息
echo '服务器和执行环境信息$_SERVER','<pre>';
print_r($_SERVER);

//HTTP GET变量
echo 'HTTP GET变量$_GET','<pre>';
print_r($_GET);

//HTTP POST变量
echo 'HTTP POST变量$_POST','<pre>';
print_r($_POST);

//HTTP POST 原生数据
echo 'HTTP POST原生数据php://input','<br>';
$original_post_data = file_get_contents('php://input');
var_dump($original_post_data);

//HTTP POST文件上传
echo 'HTTP 文件上传$_FILES','<pre>';
print_r($_FILES);

//HTTP Request变量
echo 'HTTP Request变量$_REQUEST','<pre>';
print_r($_REQUEST);

//Session变量
echo 'Session变量$_SESSION','<pre>';
$_SESSION['test'] = 'Session变量';
print_r($_SESSION);

//cookie变量
echo 'Cookie变量$_COOKIE','<pre>';
//setcookie('test', 'sdfsdf');
echo $_COOKIE['test'],'<br>';
print_r($_COOKIE);

//ENV
echo '环境变量$_ENV','<pre>';
print_r($_ENV);
echo $_ENV['USER'],'<br>';

//$http_response_header, 当使用HTTP 包装器时，$http_response_header 将会被 HTTP 响应头信息填充。$http_response_header 将被创建于局部作用域中。
echo 'HTTP 响应头','<br>';
$string = file_get_contents('https://www.yangliuan.cn/'); //其它例子 fopen() fsockopen curl等
print_r($http_response_header);

//CLI模式传参
//$argc — 传递给脚本的参数数目 包含当运行于命令行下时传递给当前脚本的参数的数目。
echo '$argc 传递给脚本的参数数目','<br>';
var_dump($argc);

//$argv — 传递给脚本的参数数组 包含当运行于命令行下时传递给当前脚本的参数的数组。
echo '$argv 传递给脚本的参数数组','<br>';
var_dump($argv);
