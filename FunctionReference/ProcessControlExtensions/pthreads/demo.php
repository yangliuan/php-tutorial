<?php

// 创建一个共享变量
$counter = new \Threaded();

// 定义线程类
class MyThread extends Thread {
    
    private $name;
    private $counter;

    public function __construct($name, $counter) {
        $this->name = $name;
        $this->counter = $counter;
    }

    public function run() {
        for ($i = 0; $i < 5; $i++) {
            $this->counter->synchronized(function($counter) {
                $counter->increment();
            }, $this->counter);
            echo "Thread {$this->name} incremented counter to: {$this->counter->count()}\n";
        }
    }
}

// 创建两个线程
$thread1 = new MyThread(1, $counter);
$thread2 = new MyThread(2, $counter);

// 开始运行线程
$thread1->start();
$thread2->start();

// 等待线程结束
$thread1->join();
$thread2->join();

// 输出最终结果
echo "Final counter value: {$counter->count()}\n";
