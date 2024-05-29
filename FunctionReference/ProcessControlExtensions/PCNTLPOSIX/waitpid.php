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
    # 父进程继续创建子进程
    echo "the first parent pid:". posix_getpid().PHP_EOL;
    for ($i=0; $i < 3; $i++) { 
        $pid2 = pcntl_fork();
        if($pid2 == 0){
            //子进程停止fork
            break;
        }
    }

    if($pid2 == -1 ){
        die('the second fork error');
    }elseif($pid2 == 0){    
        #子进程
        echo "the {$i} fork child pid:".posix_getpid().PHP_EOL;
        exit;
    }elseif ($pid2 > 0 ) {
        #父进程
        echo 'parent pid:'.posix_getpid().PHP_EOL;
        $w = pcntl_waitpid($pid,$status,0);
        if($w == $pid){
            echo 'catch a child process:pid='.$w.PHP_EOL;
        }else{
            echo 'waitpid error'.PHP_EOL;
        }
    }
}
