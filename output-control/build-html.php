<?php
/**
 * 生成静态页示例
 */

//输出控制缓冲
ob_start();
$content = '这里是内容';

//输出内容
echo <<<EOD
    <!DOCTYPE html>
    <html lang="en"> 
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <meta http-equiv="X-UA-Compatible" content="i e=edge" >
      <title>生成静态页示例</title> 
    </head>
    <body>
      <h1>生成静态页示例</h1> 
        <p>$content</p> 
    </body> 
    </html>'
EOD;

//获取输出缓冲区内容
$content = ob_get_contents();

file_put_contents('./obstatic.html', $content);
