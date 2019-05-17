<?php

function demoGenerator()
{
    yield 1;
    yield 2;
    yield 3;
}
foreach (demoGenerator() as $key => $val) {
    echo $key.'=>'.$val,'<br>';
}
//生成器是一个占用很少内存的对象
$data = demoGenerator();
var_dump($data);
echo json_encode($data);
