<?php
$password = 'sdfsdfsadfsd';
$result = preg_replace('/./', '*', $password);
echo '<pre>';
var_dump($result);
