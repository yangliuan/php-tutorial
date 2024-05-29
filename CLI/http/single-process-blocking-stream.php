<?php

// 设置服务器参数
$host = '127.0.0.1';
$port = 8080;

// 创建服务器
$server = stream_socket_server("tcp://$host:$port", $errno, $errorMessage);

if ($server === false) {
    throw new UnexpectedValueException("Could not bind to socket: $errorMessage");
}

echo "Server is running on http://$host:$port\n";

// 监听请求
while (true) {
    $client = @stream_socket_accept($server);

    if ($client) {
        // 处理请求
        $request = fread($client, 1024);
        // 构造响应
        $response = "HTTP/1.1 200 OK\r\n";
        $response .= "Content-Type: text/plain\r\n";
        $response .= "Content-Length: 11\r\n";
        $response .= "\r\n";
        $response .= "Hello World";

        fwrite($client, $response);
        fclose($client);
    }
}
