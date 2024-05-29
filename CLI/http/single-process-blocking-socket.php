<?php

// 设置服务器IP和端口号
$host = '127.0.0.1';
$port = 8080;

// 创建一个TCP socket
$server_socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!$server_socket) {
    die('Unable to create socket: ' . socket_strerror(socket_last_error()));
}

// 将socket绑定到服务器IP和端口号
if (!socket_bind($server_socket, $host, $port)) {
    die('Unable to bind socket: ' . socket_strerror(socket_last_error()));
}

// 开始监听客户端连接
if (!socket_listen($server_socket)) {
    die('Unable to listen on socket: ' . socket_strerror(socket_last_error()));
}

echo "Server is running on http://$host:$port\n";

// 进入主循环
while (true) {
    // 阻塞等待客户端连接
    $client_socket = socket_accept($server_socket);
    if (!$client_socket) {
        echo 'Unable to accept socket: ' . socket_strerror(socket_last_error()) . "\n";
        continue;
    }

    // 读取客户端请求
    $request = socket_read($client_socket, 4096);

    // 解析请求
    $lines = explode("\r\n", $request);
    $method = '';
    $url = '';
    foreach ($lines as $line) {
        if (strpos($line, 'GET') === 0) {
            $method = 'GET';
            $url = substr($line, 4);
        } elseif (strpos($line, 'POST') === 0) {
            $method = 'POST';
            $url = substr($line, 5);
        }
    }

    // 构造响应
    $response = "HTTP/1.1 200 OK\r\n";
    $response .= "Content-Type: text/plain\r\n";
    $response .= "Content-Length: 11\r\n";
    $response .= "\r\n";
    $response .= "Hello World";

    // 发送响应
    socket_write($client_socket, $response);

    // 关闭客户端连接
    socket_close($client_socket);
}

// 关闭服务器socket
socket_close($server_socket);
