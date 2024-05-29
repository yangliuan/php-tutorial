<?php
//获取当期那进程id
$pid = posix_getpid();
echo "my pid: {$pid}", PHP_EOL;
$childNum = 5;
global $a;
$a = 1;

for ($i = 1; $i <= $childNum; ++$i) {
    //fork一个进程
    $pid = pcntl_fork();
    //创建失败
    if (-1 === $pid) {
        echo "failt to fork!", PHP_EOL;
        exit;
    }  elseif( $pid == 0 ) {
        //当前进程pid
        $mypid = posix_getpid();
        //父进程pid
        $parentpid = posix_getppid();
        //子进程中操作父进程变量并显示结果
        $a++;
        echo "I'm the {$i}th child and my pid:{$mypid},parentpid:{$parentpid}  a={$a}", PHP_EOL;
        sleep($childNum);
        exit;
    } elseif ($pid > 0) {
        //parent code
        echo "fork the {$i}th child,pid:{$pid} a={$a}", PHP_EOL;
    }
}


