<?php

//通过数组方式访问对象属性
class obj implements arrayaccess
{
    private $container = array();

    public function __construct()
    {
        $this->container = array(
            'one' => 1,
            'two' => 2,
            'three' => 3,
        );
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
}

$obj = new obj();
//是否存在索引为two的值,true
var_dump(isset($obj['two']));
var_dump($obj['two']);
echo'<br>';

//删除索引为two的值
unset($obj['two']);
//是否存在索引为two,false
var_dump(isset($obj['two']));
echo'<br>';

//给索引为two的元素复制
$obj['two'] = 'A value';
var_dump($obj['two']);
echo'<br>','<pre>';

//用数组方式给对象赋值
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);
print_r($obj[0]);
