<?php

class Example
{
    protected $a;

    public $b = 1;

    private $c;

    public function __set(string $name, $value)
    {
        $this->$name = $value;
    }

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function __isset(string $name)
    {
        return isset($this->$name);
    }

    public function __unset(string $name)
    {
        unset($this->$name);
    }
}
$example = new Example();
//set a
$example->a = 100;
echo '<pre>';
var_dump($example);
//set b
$example->c = 'test';
//get c
echo $example->c;
//isset c
var_dump(isset($example->c));
//unset a
unset($example->a);
var_dump($example);
