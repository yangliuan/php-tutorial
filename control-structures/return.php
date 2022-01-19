<?php
$a =[1,2,3,4,5,6];

foreach ($a as $key => $value) {
    if ($value === 3) {
        return $value;
    }
    
    echo $value.PHP_EOL;
}
