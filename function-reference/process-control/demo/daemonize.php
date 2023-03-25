<?php
// Fork the current process
$pid = pcntl_fork();

// If pid is negative, an error occurred
if ($pid == -1) {
    exit("Error forking...\n");
} 
// If pid is 0, this is the child process
elseif ($pid === 0) {
    // Make the child process a new session leader
    if (posix_setsid() === -1) {
        exit("Error creating new session...\n");
    }

    // 重置文件掩码
    umask(0);
    
    $dir = '../../../vendor/mydaemon.log';
    // Open a log file for writing
    $log = fopen($dir, 'w');

    // Loop indefinitely
    while (true) {
        // Write a message to the log file
        fwrite($log, "Daemon is running...\n");

        // Sleep for 5 seconds
        sleep(5);
    }
    
    //close the standard input, output, and error streams respectively.
    //REF:https://www.php.net/manual/zh/wrappers.php.php
    //REF:https://www.php.net/manual/zh/features.commandline.io-streams.php

    fclose(STDIN);
    fclose(STDOUT);
    fclose(STDERR);
} 
// If pid is positive, this is the parent process
else {
    // Exit the parent process
    exit('Exit the parent process');
}
