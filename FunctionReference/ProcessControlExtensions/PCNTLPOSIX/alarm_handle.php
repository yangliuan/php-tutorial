<?php
// 定义信号处理函数
function sig_handler($signo)
{
    switch ($signo) {
        case SIGALRM:
            echo "Alarm signal received\n";
            exit;
            break;
        default:
            // 处理所有其他信号
    }
}

// 安装信号处理函数
pcntl_signal(SIGALRM, "sig_handler");

// 设置一个 5 秒钟后的闹钟
pcntl_alarm(3);

echo "Waiting for alarm...\n";

// 无限循环，等待信号到来
while (true) {
    // 检查是否有挂起的信号，并调用信号处理器
    pcntl_signal_dispatch();
    // 模拟一些工作
    sleep(1);
}
