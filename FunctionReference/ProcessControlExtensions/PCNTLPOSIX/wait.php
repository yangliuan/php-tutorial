<?php
$pid = pcntl_fork();
if($pid == -1) {
    die('fork error');
} elseif($pid > 0) {
    # 父进程
    echo 'Im parent my pid:'.posix_getpid().PHP_EOL;
    # 在父进程中使用wait等待子进程退出后在退出父进程,避免子进程成为僵尸
    pcntl_wait($status);
    echo 'status:'.$status.PHP_EOL;
    exit;
} elseif($pid == 0) {
    # 子进程
    sleep(3);
    echo 'Im child my parent pid:'.posix_getppid().PHP_EOL;
    echo 'Im child my pid:'.posix_getpid().PHP_EOL;
    exit;
}
