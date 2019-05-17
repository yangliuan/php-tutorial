<?php

//获取当期那进程id
$pid = posix_getpid();
echo "my pid: {$pid}\n";
$childNum = 10;
for ($i = 1; $i <= 10; ++$i) {
    //fork一个进程
    $pid = pcntl_fork();
    //创建失败
    if (-1 === $pid) {
        echo "failt to fork!\n";
        exit;
    } elseif ($pid > 0) {
        //parent code
        echo "fork the {$i}th child,pid:{$pid}\n";
    } else {
        //当前进程pid
        $mypid = posix_getpid();
        //父进程pid
        $parentpid = posix_getppid();
        echo "I'm the {$i}th child and my pid:{$mypid},parentpid:{$parentpid}\n";
        sleep(5);
        exit;
    }
}
