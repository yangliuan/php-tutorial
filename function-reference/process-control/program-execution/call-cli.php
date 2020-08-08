<?php
$script = 'phpsapi.php';
$result = exec('php ' . escapeshellarg($script));
var_dump($result);
