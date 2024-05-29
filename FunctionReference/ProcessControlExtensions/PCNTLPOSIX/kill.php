<?php

declare(ticks=1);

$pid = pcntl_fork();
if($pid == 0) {
    sleep(1);
    echo 'Im child my pid:'.posix_getpid().PHP_EOL;
    $parent_pid = posix_getppid();
    echo 'send signal to my parent pid:'.$parent_pid.PHP_EOL;
    posix_kill($parent_pid, SIGKILL);
} elseif($pid > 0) {
    while (true) {
        echo 'Im parent my pid:'.$pid.' my ppid:'.posix_getppid().PHP_EOL;
    }
} else {
    die('fork error');
}
