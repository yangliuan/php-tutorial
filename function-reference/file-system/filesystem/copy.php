<?php
$original = '/home/yangliuan/Videos';
$target = '/home/yangliuan/Pictures';
$result = shell_exec("cp -rv $original/* $target");
var_dump($result);
