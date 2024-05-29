<?php

include 'static.php';
$demo = new Demo();
$demo->count();
$demo->count();
for ($i = 0; $i < 10; ++$i) {
    $demo->count();
}
