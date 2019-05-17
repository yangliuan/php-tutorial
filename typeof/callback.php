<?php

// An example callback function
function my_callback_function()
{
    echo 'hello world!','<br>';
}

// An example callback method
class MyClass
{
    public static function myCallbackMethod()
    {
        echo 'Hello World!','<br>';
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));
