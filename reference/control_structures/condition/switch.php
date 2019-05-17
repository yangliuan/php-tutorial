<?php

//switch/case 作的是松散比较 不判断类型

//跳出
switch ($variable) {
    case 'value1':
        // code...
        break;
    case 'value2':
        // code...
        break;
    default:
        // code...
        break;
}

//不跳出
switch ($variable) {
    case 'value1':
        // code...
    case 'value2':
        // code...
        break;
    default:
        // code...
        break;
}

//替代语法
switch ($variable):
    case 'value1':
    //...
    break;

    case 'value2':
    //...
    break;

    default:
    //...
    break;
endswitch;

//函数中退出
function switchTest($variable)
{
    switch ($variable) {
        case '1':
            echo '1','<br>';

            return 1;
        case '2':
            echo '2','<br>';

            return 2;
        default:
            // code...
            return;
    }
}

$res = switchTest(1);
var_dump($res);
echo '<br>';
$res = switchTest(2);
var_dump($res);
