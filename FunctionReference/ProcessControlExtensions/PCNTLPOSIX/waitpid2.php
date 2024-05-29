<?php

$pid = pcntl_fork();

if($pid == -1) {
    die('the first fork error');
} elseif($pid == 0) {
    # 子进程挂起
    sleep(5);
    echo 'Im first child my parent pid:'.posix_getppid().PHP_EOL;
    echo 'Im first child my pid:'.posix_getpid().PHP_EOL;
    exit;
} elseif($pid > 0) {
    # 父进程
    echo "the first parent pid:". posix_getpid().PHP_EOL;
    # 在父进程中循环捕获子进程信号
    do {
        $w = pcntl_waitpid($pid, $status, WNOHANG);
        echo 'w:'.$w.' status:'.$status.PHP_EOL;
        echo 'No child exited'.PHP_EOL;
        sleep(1);
    } while ($w == 0);

    if($w == $pid) {
        echo 'catch a child process pid:'.$w.PHP_EOL;
    } else {
        echo 'waitpid error'.PHP_EOL;
    }
}
