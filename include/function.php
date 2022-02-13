<?php

function print_memory_info($msg, $real_usage = false)
{
    echo $msg,ceil(memory_get_usage($real_usage) / 1024),'KB','<br>';

    return memory_get_usage($real_usage);
}

