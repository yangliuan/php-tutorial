<?php

$a = 5;
$b = &$a;
unset($a);
var_dump($a, $b);
echo '<br>';
