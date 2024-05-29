<?php

$key = ini_get('session.upload_progress.prefix').$_POST[ini_get('session.upload_progress.name')];
var_dump($key);
var_dump($_SESSION[$key]);
echo '<pre>';
print_r($_FILES);
