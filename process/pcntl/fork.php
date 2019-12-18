<?php

//获取当期那进程id
$pid = posix_getpid();
echo "my pid: {$pid}", PHP_EOL;
$childNum = 10;
for ($i = 1; $i <= 10; ++$i) {
    //fork一个进程
    $pid = pcntl_fork();
    //创建失败
    if (-1 === $pid) {
        echo "failt to fork!", PHP_EOL;
        exit;
    } elseif ($pid > 0) {
        //parent code
        echo "fork the {$i}th child,pid:{$pid}", PHP_EOL;
    } else {
        //当前进程pid
        $mypid = posix_getpid();
        //父进程pid
        $parentpid = posix_getppid();
        echo "I'm the {$i}th child and my pid:{$mypid},parentpid:{$parentpid}", PHP_EOL;
        sleep(5);
        exit;
    }
}
