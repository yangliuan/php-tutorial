<?php
// 设置监听端口和地址
$host = 'localhost';
$port = 8000;

// 创建服务器套接字并开始监听连接请求
$server = stream_socket_server("tcp://$host:$port", $errno, $errstr);

if (!$server) {
    die("Error: $errstr ($errno)\n");
}

echo "Listening on http://$host:$port\n";

// 处理传入连接请求
while (true) {
    // 等待并接受客户端连接请求
    $client = @stream_socket_accept($server);
    //每接收一个请求，创建一个子进程
    if ($client) {
        // 处理请求并响应客户端
        $pid = pcntl_fork(); // 创建子进程

        if ($pid == -1) {
            die("Error: Failed to fork process\n");
        } elseif ($pid) {
            // 在父进程中继续等待连接请求
            fclose($client);
        } else {
            // 在子进程中处理请求
            $request = fgets($client);
            error_log($request);

            // 处理请求并生成响应
            $response = "HTTP/1.1 200 OK\r\n";
            $response .= "Content-Type: text/plain\r\n";
            $response .= "Content-Length: " . strlen('Hello, World!') . "\r\n";
            $response .= "Connection: close\r\n";
            $response .= "\r\n";
            $response .= "Hello, World!";

            // 将响应发送回客户端
            fwrite($client, $response);

            // 关闭客户端套接字
            fclose($client);

            // 终止子进程
            exit(0);
        }
    }
}

// 关闭服务器套接字
fclose($server);
