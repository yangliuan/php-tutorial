<?php
echo '进程标识[PID]:', posix_getpid(), PHP_EOL;
echo '父进程标识符[PPID]:', posix_getppid(), PHP_EOL;
echo '用户标识符[UID]:', posix_getuid(), PHP_EOL;
echo '有效用户标识符[EUID]:', posix_geteuid(), PHP_EOL;
echo '组标识符[GID]:', posix_getgid(), PHP_EOL;
echo '有效组标识符[EGID]:', posix_getegid(), PHP_EOL;
