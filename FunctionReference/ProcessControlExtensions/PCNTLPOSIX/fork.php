<?php

$pid = pcntl_fork();
if ($pid == -1) {
    die('could not fork');
} elseif ($pid) {
    // 父进程
    echo '父进程id'.posix_getppid().PHP_EOL;
} else {
    // 子进程
    echo '子进程id'.posix_getpid().PHP_EOL;
}
