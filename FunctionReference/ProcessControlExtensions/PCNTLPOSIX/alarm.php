<?php
# 进程定时器，精确到秒
pcntl_alarm(1);
while (1) {
    # code...
    echo 'process will finsh'.PHP_EOL;
}
