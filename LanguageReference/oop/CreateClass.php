<?php

namespace OOP;

class CreateObject
{
    const FIX = 1;
    public $a;
    protected $b;
    private $c;

    public function __construct()
    {
        echo '初始化','<br>';
    }

    public static function create()
    {
        return new static();
    }

    public function __destroy()
    {
        echo '销毁','<br>';
    }
}

//创建对象
$obj = new CreateObject();
var_dump($obj);
echo '<br>';

//静态方法创建对象
$obj = CreateObject::create();
var_dump($obj);
echo '<br>';

//命名空间和类名
echo '命名空间和类名',CreateObject::class,'<br>';

//访问类常量,属性,方法
echo '常量',CreateObject::FIX,'<br>';
