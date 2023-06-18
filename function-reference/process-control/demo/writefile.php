<?php
if (!extension_loaded('sysvmsg') || !extension_loaded('sysvsem') || !extension_loaded('sysvshm')) {
    dl('sysvmsg.so');
    dl('sysvsem.so');
    dl('sysvshm.so');
}

$sem_key = 0x1234; // 设置信号量 key（键）
$sem_id = sem_get($sem_key, 1, 0666 | IPC_CREAT); // 创建一个信号量

if ($sem_id === false) {
    echo "Error creating semaphore\n";
    exit(1);
}

$num_processes = 5; // 设置进程数
$processes = array();

for ($i = 0; $i < $num_processes; $i++) {
    $pid = pcntl_fork(); // 创建子进程

    if ($pid == -1) {
        echo "Error creating child process\n";
        exit(1);
    } elseif ($pid == 0) {
        // 子进程
        $sem_value = sem_acquire($sem_id); // 获取信号量

        if ($sem_value === false) {
            echo "Error acquiring semaphore\n";
            exit(1);
        }

        // 在文件中写入一行数据
        $data = "Process " . getmypid() . " wrote this line\n";
        $file = fopen("data.txt", "a");
        fwrite($file, $data);
        fclose($file);

        $sem_value = sem_release($sem_id); // 释放信号量

        if ($sem_value === false) {
            echo "Error releasing semaphore\n";
            exit(1);
        }

        exit(0);
    } else {
        // 父进程
        $processes[] = $pid;
    }
}

// 等待所有子进程完成
foreach ($processes as $pid) {
    pcntl_waitpid($pid, $status);
}

sem_remove($sem_id); // 删除信号量


