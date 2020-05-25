<?php

class Demo
{
    public static $num;

    public function count()
    {
        echo static::$num++,'<br>';
    }
}
