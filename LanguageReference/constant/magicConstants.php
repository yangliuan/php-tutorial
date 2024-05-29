<?php

echo '行号',__LINE__,'<br>';
echo  '路径和文件名',__FILE__,'<br>';
echo '文件目录',__DIR__,'<br>';
class A
{
    public function printClassName()
    {
        echo '调用类名',__CLASS__;
    }
}

(new A())->printClassName();
